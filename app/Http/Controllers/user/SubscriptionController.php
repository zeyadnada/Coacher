<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\appendages\WhatsAppController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Payment\PaymobController;
use App\Http\Requests\UserSubscriptionRequest;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function store(UserSubscriptionRequest $request)
    {
        // dd($request->all());
        // $subscription = Subscription::create($request->all());
        $subscription = Subscription::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'whatsapp_phone' => $request->input('full_phone'),
            'starting_date' => $request->input('starting_date'),
            'package_id' => $request->input('package_id'),

        ]);
        $order = $subscription->toArray();
        $order['payment_method'] = $request->payment_method;
        $order['amount_paid'] = $subscription->package->final_price;

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
            return (new PaymobController())->checkingOut($order, env('PAYMOB_CARD_INTEGRATION_ID'));
        }
        // session()->forget("coupon_$id");
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
        return  redirect()->route('home')->with('paymentSuccess','تم اشتراكك');
    }

    public  function failed_payment()
    {
        return  redirect()->route('home')->with('paymentFailed','فشل الاشتراك');
    }

    // public  function notSecure_payment()
    // {
    //     return  redirect()->route('home')->with('error', 'فشلت عملية الدفع! حاول  مرة أخرى');
    // }
}