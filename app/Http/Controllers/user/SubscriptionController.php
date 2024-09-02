<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptionRequet;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function store(SubscriptionRequet $request)
    {
        // if(session()->has('coupon')){
        //     //must store in different way
        //     session()->forget('coupon');
        // }else{

            Subscription::create($request->all());
        // }
    }

    public function update(SubscriptionRequet $request, $id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->update($request->all());
    }
}
