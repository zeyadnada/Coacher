<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Trainer;
use App\Models\TrainingPackage;
use App\Models\Transformation;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        $packages = TrainingPackage::with('durations')->get();
        $transformations = Transformation::all();
        $trainers = Trainer::select('id', 'name', 'job_title', 'image')->get();
        return view('user.index', compact('packages', 'transformations', 'trainers'));
    }
}