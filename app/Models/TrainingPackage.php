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
        return $this->discount_price ?? $this->price;
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}