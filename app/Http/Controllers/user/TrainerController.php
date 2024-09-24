<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Trainer;

class TrainerController extends Controller
{


    public function index()
    {
        $trainers = Trainer::all();
        return view('user.trainer.index', compact('trainers'));
    }

    public function show($id)
    {
        $trainer = Trainer::findOrFail($id);
        return view('user.trainer.show', compact('trainer'));
    }
}