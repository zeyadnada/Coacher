<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\TrainingPackage;
use App\Models\TrainingPackageDuration;
use Illuminate\Http\Request;

class TrainingPackageController extends Controller
{
    public function index()
    {
        $packages = TrainingPackage::select('id', 'title', 'image')->get();
        return view('user.training_package.index', compact('packages'));
    }

    public function show($id)
    {
        // Retrieve the duration_id from the query string
        $durationId = request()->query('duration_id');

        // Find the package
        $package = TrainingPackage::with('durations')->findOrFail($id);

        // Optionally, find the selected duration based on duration_id
        $selectedDuration = $durationId ? $package->durations->firstWhere('id', $durationId) : null;

        return view('user.training_package.show', compact('package', 'selectedDuration'));
    }
}