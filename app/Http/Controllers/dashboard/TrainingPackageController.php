<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrainingPackageRequest;
use App\Models\TrainingPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrainingPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = TrainingPackage::all();
        return view('dashboard.training_package.index',compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.training_package.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TrainingPackageRequest $request)
    {
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $imagePath = Storage::disk('public')->put('package',  $request->image);
            $data['image'] = $imagePath;
        }
        $package = TrainingPackage::create($data);
        return redirect()->route('dashboard.training-packages.show', $package->id)->with('success', 'Training Package Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $package = TrainingPackage::findOrFail($id);
        return view('dashboard.training_package.show', compact('package'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $package = TrainingPackage::findOrFail($id);
        return view('dashboard.training_package.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TrainingPackageRequest $request, $id)
    {
        $package = TrainingPackage::findOrFail($id);
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            if ($package->image && Storage::disk('public')->exists($package->image)) {
                Storage::disk('public')->delete($package->image);
            }
            $imagePath = Storage::disk('public')->put('package', $request->image);
            $data['image'] = $imagePath;
        }
        $package->update($data);
        return redirect()->route('dashboard.training-packages.show', $package->id)->with('success', 'Trainer Package Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $package = TrainingPackage::findOrFail($id);
        if ($package->image && Storage::disk('public')->exists($package->image)) {
            Storage::disk('public')->delete($package->image);
        }
        $package->delete();
        return back()->with('success', 'Training Package Deleted Successfully.');
    }
}