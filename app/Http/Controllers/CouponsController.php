<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Subscription;
use App\Models\TrainingPackage;
use Illuminate\Http\Request;

class CouponsController extends Controller
{

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        // Validate that the coupon code is provided
        $request->validate([
            'coupon_code' => 'required|string',
        ]);

        // Retrieve the subscription
        $subscription = TrainingPackage::find($id);

        // Retrieve the coupon
        $coupon = Coupon::where('code', $request->coupon_code)->first();

        if (!$coupon) {
            return back()->withErrors('Invalid coupon code. Please try again.');
        }

        // Store coupon details in session
        session()->put("coupon_$id", [
            'code' => $coupon->code,
            'type' => $coupon->type,
            'value' => $coupon->value,
            'percent' => $coupon->percent_off,
            'discount' => $coupon->discount($subscription->price),
        ]);

        // Return with a success message
        return back()->with('success_message', 'Coupon has been applied!');
    }




    public function destroy($id)
    {
        session()->forget("coupon_$id");
        return back()->with('success_message', 'Coupon has been Removed!');
    }
}
