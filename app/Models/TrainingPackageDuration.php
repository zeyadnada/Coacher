<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingPackageDuration extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function getFinalPriceAttribute()
    {
        // Check if there is a coupon applied in the session
        $coupon = session()->get('coupon');

        // Ensure a coupon exists before proceeding
        if ($coupon) {
            $couponType = $coupon['type'];
            $couponValue = ($couponType === 'percent') ? $coupon['percent'] : $coupon['value'];

            // Calculate the base discounted price (if discount_price exists)
            $basePrice = $this->discount_price ?? $this->price;

            // Apply the coupon discount based on the type
            if ($couponType === 'percent') {
                // Calculate percentage discount
                $discount = ($basePrice * $couponValue) / 100;
                $finalPrice = $basePrice - $discount;
            } elseif ($couponType === 'fixed') {
                // Apply fixed discount
                $finalPrice = $basePrice - $couponValue;
            }

            // Ensure the final price is not negative
            return max($finalPrice, 0);
        }

        // If no coupon is applied, return the base price
        return $this->discount_price ?? $this->price;
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
