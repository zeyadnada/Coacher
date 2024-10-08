<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $guarded = [];


    public static function findByCode($code)
    {
        return self::where('code', $code)->first();
    }

    // public function discount($total)
    // {
    //     if ($this->type == 'fixed') {
    //         return $total-$this->value;
    //     } elseif ($this->type == 'percent') {
    //         return $total- round(($this->percent_off / 100) * $total);
    //     } else {
    //         return 0;
    //     }
    // }
}