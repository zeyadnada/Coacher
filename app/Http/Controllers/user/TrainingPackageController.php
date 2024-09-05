<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\TrainingPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainingPackageController extends Controller
{
    public function index()
    {
        $packages = TrainingPackage::all();
        return view('user.training_package.index', compact('packages'));
    }

    public function show($id)
    {
        // Retrieve the package
        $package = TrainingPackage::findOrFail($id);
        return view('user.training_package.show', compact('package'));
    }
}