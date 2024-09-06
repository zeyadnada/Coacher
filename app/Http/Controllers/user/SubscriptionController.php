<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Payment\PaymobController;
use App\Http\Requests\UserSubscriptionRequest;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function store(UserSubscriptionRequest $request, $id)
    {
        // $subscription = Subscription::create($request->all());
        $subscription = Subscription::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'whatsapp_phone' => $request->input('whatsapp_phone'),
            'starting_date' => $request->input('starting_date'),
            'package_id' => $request->input('package_id'),

        ]);
        $order = $subscription->toArray();
        $order['payment_method'] = $request->payment_method;

        // add amount paid at the following line
        $order['amount_paid'] = session()->get("coupon_$id")["discount"];
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
        session()->forget("coupon_$id");
    }
}
