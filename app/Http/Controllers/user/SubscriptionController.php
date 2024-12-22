<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\appendages\WhatsAppController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\payment\PaymobController;
use App\Http\Requests\UserSubscriptionRequest;
use App\Models\Subscription;
use App\Models\TrainingPackageDuration;

class SubscriptionController extends Controller
{
    public function store(UserSubscriptionRequest $request)
    {
        $subscription = Subscription::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'whatsapp_phone' => $request->input('full_phone'),
            'starting_date' => $request->input('starting_date'),
            'package_id' => $request->input('package_id'),
            'duration_id' => $request->input('duration_id'),
        ]);
        $order = $subscription->toArray();
        $order['payment_method'] = $request->payment_method;
        $duration = TrainingPackageDuration::findOrFail($request->input('duration_id'));
        $amount_paid = $duration->final_price;
        $order['amount_paid'] = $amount_paid;


        if ($request->payment_method === "paymob_card_payment") {
            return (new PaymobController())->checkingOut($order, config('services.paymob.card_integration_id'));
        } elseif ($request->payment_method === "paymob_wallet_payment") {
            return (new PaymobController())->checkingOut($order, config('services.paymob.wallet_integration_id'));
        } elseif ($request->payment_method === "paymob_value_payment") {
            return (new PaymobController())->checkingOut($order, config('services.paymob.card_integration_id'));
        } elseif ($request->payment_method === "paymob_bank_installement_payment") {
            return (new PaymobController())->checkingOut($order, config('services.paymob.bank_installment_integration_id'));
        } elseif ($request->payment_method === "instapay") {
            $subscription->update([
                'transaction_id' => 'Instapay'
            ]);
            // Forget coupon after successful payment
            session()->forget("coupon");
            return view('user.transaction_pages.instapay', compact('amount_paid'));
        } elseif ($request->payment_method === "vodafone_cash") {
            $subscription->update([
                'transaction_id' => 'Vodafone Cash'
            ]);
            // Forget coupon after successful payment
            session()->forget("coupon");
            return view('user.transaction_pages.vodafone_cash', compact('amount_paid'));
        }
    }

    public function success_payment($payment_details)
    {
        $subscription = Subscription::findOrFail($payment_details['merchant_order_id']);
        $subscription->update([
            'amount_paid' => $payment_details['amount_cents'] / 100,
            'payment_status' => 'Paid',
            'transaction_id' => $payment_details['id']
        ]);

        // Forget coupon after successful payment
        session()->forget("coupon");

        // Send WhatsApp confirmation
        (new WhatsAppController())->order_confirmation(
            config('services.whatsapp.phone_number_id'),
            $subscription->id,
            $subscription->whatsapp_phone,
            $subscription->package->title
        );

        // Set session variables with expiration for payment status route 
        session([
            'paymentSuccess' => "شكراً $subscription->name ،تم اشتراكك برقم $subscription->whatsapp_phone. رقم الطلب هو $subscription->id ،وسيتم التواصل معك خلال 24 ساعة.",
            'subscriptionId' => $subscription->id,
        ]);
        session()->put('session_start_time', now());

        return redirect()->route('user.payment.status', [
            'status' => 'success',
        ]);
    }


    public  function failed_payment($order_id)
    {
        $subscription = Subscription::findOrFail($order_id);
        $subscription->update([
            'payment_status' => 'Failed',
        ]);
        return  redirect()->route('user.payment.status', [
            'status' => 'failed',
        ])->with('paymentFailed', 'فشل الاشتراك');
    }

    // public  function notSecure_payment()
    // {
    //     return  redirect()->route('home')->with('error', 'فشلت عملية الدفع! حاول  مرة أخرى');
    // }
}
