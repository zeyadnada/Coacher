<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingPackage extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getFinalPriceAttribute()
    {
        // Check if there is a coupon applied in the session
        $couponType = session()->get('coupon_type'); // 'percentage' or 'fixed'
        $couponValue = session()->get('coupon_value', 0); // Value of the coupon (either percentage or fixed)

        // Calculate the base discounted price (if discount_price exists)
        $basePrice = $this->discount_price ?? $this->price;

        // Apply the coupon discount based on the type
        if ($couponType === 'percentage') {
            // Calculate percentage discount
            $discount = ($basePrice * $couponValue) / 100;
            return $basePrice - $discount;
        } elseif ($couponType === 'fixed') {
            // Apply fixed discount
            return $basePrice - $couponValue;
        }

        // If no coupon is applied, return the base price
        return $basePrice;
    }


    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}