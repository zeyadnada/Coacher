<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{

    public function show($id) 
    {
        $trainer=Trainer::findOrFail($id);
        return view('user.trainer.show',compact('trainer'));
    }
}