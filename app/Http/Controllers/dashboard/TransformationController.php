<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Transformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TransformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transformations = Transformation::all();
        return view('dashboard.settings.transformation', compact('transformations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo_path' => ['required', 'mimes:jpeg,png,jpg,gif']
        ]);

        $data = $request->except('photo_path');
        if ($request->hasFile('photo_path')) {
            $imagePath = Storage::disk('public')->put('transformation',  $request->photo_path);
            $data['photo_path'] = $imagePath;
        }
        Transformation::create($data);
        return redirect()->back()->with('success', 'Transformation created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transformation $transformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transformation $transformation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $transformation = Transformation::findOrFail($id);
        $data = $request->except('photo_path');
        if ($request->hasFile('photo_path')) {
            if ($transformation->photo_path && Storage::disk('public')->exists($transformation->photo_path)) {
                Storage::disk('public')->delete($transformation->photo_path);
            }
            $imagePath = Storage::disk('public')->put('transformation', $request->photo_path);
            $data['photo_path'] = $imagePath;
        }
        $transformation->update($data);
        return redirect()->back()->with('success', 'Transformation Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transformation = Transformation::findOrFail($id);
        if ($transformation->photo_path && Storage::disk('public')->exists($transformation->photo_path)) {
            Storage::disk('public')->delete($transformation->photo_path);
        }
        $transformation->delete();
        return back()->with('success', 'transformation Deleted Successfully.');
    }
}