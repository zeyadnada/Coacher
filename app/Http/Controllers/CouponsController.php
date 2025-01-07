<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Coupon;
use App\Models\TrainingPackage;
use App\Notifications\CouponNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class CouponsController extends Controller
{
    public function index()
    {
        $coupons = Coupon::all();
        return view('dashboard.Coupon.index', compact('coupons'));
    }
    public function create()
    {
        return view('dashboard.Coupon.create');
    }
    public function edit($id)
    {
        $coupon = Coupon::find($id);
        return view('dashboard.Coupon.edit', compact('coupon'));
    }
    public function update(Request $request, $id)
    {
        $coupon = Coupon::findOrFail($id);
        $admins = Admin::all();

        // Define the validation rules
        $rules = [
            'code' => 'required|string|max:255|unique:coupons,code,' . $coupon->id, // Unique Coupon with ignore the current Coupon
            'type' => 'required|in:fixed,percent', // Type must be either 'fixed' or 'percent'

            'value' => [
                'nullable',
                'numeric',
                'min:0',
                'prohibited_if:type,percent', // Prohibit 'value' if 'type' is 'percent'
                'required_if:type,fixed', // Make 'value' required if 'type' is 'fixed'
            ],

            'percent_off' => [
                'nullable',
                'numeric',
                'min:0',
                'max:100',
                'prohibited_if:type,fixed', // Prohibit 'percent_off' if 'type' is 'fixed'
                'required_if:type,percent', // Make 'percent_off' required if 'type' is 'percent'
            ],
            'usage_limit' => 'required|integer|min:0', // Usage limit must be a non-negative integer
        ];

        // Validate the request
        $validatedData = $request->validate($rules);

        // Update the coupon with validated data
        $coupon->update($validatedData);

        // Send a notification to admins
        Notification::send($admins, new CouponNotification($coupon, 'update'));

        // Redirect back with a success message
        return redirect()->route('dashboard.coupon.index')->with('success', 'Coupon has been updated successfully!');
    }

    public function save(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:255|unique:coupons,code', // Ensures the code is required, a string, and unique in the coupons table
            'type' => 'required|in:fixed,percent', // Ensures the type is either 'fixed' or 'percent'
            'value' => [
                'nullable', // Allows the field to be null
                'numeric',
                'min:0',
                'prohibited_if:type,percent', // Prohibit 'value' if 'type' is 'percent'
                'required_if:type,fixed', // Make 'value' required if 'type' is 'fixed'
            ],
            'percent_off' => [
                'nullable', // Allows the field to be null
                'numeric',
                'min:0',
                'max:100',
                'prohibited_if:type,fixed', // Prohibit 'percent' if 'type' is 'fixed'
                'required_if:type,percent', // Make 'percent_off' required if 'type' is 'percent'
            ],
            'usage_limit' => 'required|integer|min:0', // Ensures the usage limit is required, an integer, and non-negative
        ]);

        $coupon = Coupon::create($request->all());
        $admins = Admin::all();
        Notification::send($admins, new CouponNotification($coupon, 'add'));
        return redirect()->route('dashboard.coupon.index')->with('success', 'Coupon has been added successfully!');
    }
    public function delete($id)
    {
        $coupon = Coupon::findOrFail($id);
        $admins = Admin::all();
        $coupon->delete();
        Notification::send($admins, new CouponNotification($coupon, 'delete'));
        return back()->with('success', 'Coupon Deleted Successfully.');
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

        // Retrieve the coupon
        $coupon = Coupon::where('code', $request->coupon_code)->first();

        if (!$coupon) {
            return back()->with('error', 'هذا الكوبون غير صالح');
        }

        // Check if the coupon has exceeded its usage limit
        if ($coupon->usage_limit <= 0) {
            return back()->with('error', 'تم الوصول إلى الحد الأقصى لاستخدام هذا الكوبون');
        }

        // Store coupon details in session
        session()->put("coupon", [
            'id' => $coupon->id,
            'code' => $coupon->code,
            'type' => $coupon->type,
            'value' => $coupon->value,
            'percent' => $coupon->percent_off,
        ]);

        // Return with a success message
        return back()->with('success', 'تم تفعيل الكوبون');
    }

    public function destroy($id)
    {
        session()->forget("coupon");
        return back()->with('success', 'تم الغاء تفعيل الكوبون');
    }
}
