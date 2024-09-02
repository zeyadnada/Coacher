<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Trainer;
use App\Models\Transformation;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        $trainers = Trainer::all();
        $transformations = Transformation::all();
        return view('user.index', compact('trainers', 'transformations'));
    }
}
