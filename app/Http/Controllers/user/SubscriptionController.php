<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Payment\PaymobController;
use App\Http\Requests\SubscriptionRequet;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function store(SubscriptionRequet $request)
    {
        // $subscription = Subscription::create($request->all());
        $subscription = Subscription::create([
            'user_id' => $request->input('user_id'),
            'package_id' => $request->input('package_id'),
            'trainer_id' => $request->input('trainer_id'),
            'age' => $request->input('age'),
            'height' => $request->input('height'),
            'weight' => $request->input('weight'),
            'whatsapp_phone' => $request->input('whatsapp_phone'),
            'starting_date' => $request->input('starting_date'),
            'status' => $request->input('status', 'Pending'), // Default to 'Pending' if not provided
        ]);
        $order = $subscription->toArray();
        $order['payment_method'] = $request->payment_method;
        $order['price'] = $subscription->package->price;


        if ($request->payment_method === "paymob_card_payment") {
            return (new PaymobController())->checkingOut($order, env('PAYMOB_CARD_INTEGRATION_ID'));
        } elseif ($request->payment_method === "paymob_wallet_payment") {
            return (new PaymobController())->checkingOut($order, env('PAYMOB_MOBILE_WALLET_INTEGRATION_ID'));
        } elseif ($request->payment_method === "paymob_value_payment") {
            return (new PaymobController())->checkingOut($order, env('PAYMOB_CARD_INTEGRATION_ID'));
        } elseif ($request->payment_method === "paymob_bank_installement_payment") {
            return (new PaymobController('w'))->checkingOut($order, env('PAYMOB_CARD_INTEGRATION_ID'));
        }
    }

    public function update(SubscriptionRequet $request, $id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->update($request->all());
    }
}