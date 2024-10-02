<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function package()
    {
        return $this->belongsTo(TrainingPackage::class);
    }
    
    public function duration()
    {
        return $this->belongsTo(TrainingPackageDuration::class);
    }

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }
}