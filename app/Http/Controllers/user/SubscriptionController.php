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
            'duration_id'=>$request->input('duration_id'),
        ]);
        $order = $subscription->toArray();
        $order['payment_method'] = $request->payment_method;
        $duration = TrainingPackageDuration::findOrFail($request->input('duration_id'));
        $order['amount_paid'] = $duration->final_price;
        session()->forget("coupon");
        // dd($order);
        // add amount paid at the following line
        // $order['amount_paid'] = session()->get("coupon_$id")["discount"];
        // dd($order);

        if ($request->payment_method === "paymob_card_payment") {
            return (new PaymobController())->checkingOut($order, env('PAYMOB_CARD_INTEGRATION_ID'));
        } elseif ($request->payment_method === "paymob_wallet_payment") {
            return (new PaymobController())->checkingOut($order, env('PAYMOB_MOBILE_WALLET_INTEGRATION_ID'));
        } elseif ($request->payment_method === "paymob_value_payment") {
            return (new PaymobController())->checkingOut($order, env('PAYMOB_CARD_INTEGRATION_ID'));
        } elseif ($request->payment_method === "paymob_bank_installement_payment") {
            return (new PaymobController())->checkingOut($order, env('PAYMOB_BANK_INSTALLMENT_INTEGRATION_ID'));
        } elseif ($request->payment_method === "instapay") {
            $subscription->update([
                'transaction_id' =>'Instapay'
            ]);
            return view('user.transaction_pages.instapay');
        }
    }

    public  function success_payment($payment_details)
    {
        $subscription = Subscription::findOrFail($payment_details['merchant_order_id']);
        $subscription->update([
            'amount_paid' => $payment_details['amount_cents'] / 100,
            'payment_status' => 'Paid',
            'transaction_id' => $payment_details['id']
        ]);
        (new WhatsAppController())->order_confirmation(env('WHATSAPP_PHONE_NUMBER_ID'), $subscription->name, $subscription->whatsapp_phone, $subscription->package->title);
        return  redirect()->route('home')->with('paymentSuccess', 'تم اشتراكك')->with('subscriptionId', $subscription->id);
    }

    public  function failed_payment()
    {
        return  redirect()->route('home')->with('paymentFailed', 'فشل الاشتراك');
    }

    // public  function notSecure_payment()
    // {
    //     return  redirect()->route('home')->with('error', 'فشلت عملية الدفع! حاول  مرة أخرى');
    // }
}