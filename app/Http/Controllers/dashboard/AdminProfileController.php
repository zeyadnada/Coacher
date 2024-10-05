<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminEditProfileRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    public function show(string $id)
    {
        $admin = Admin::findOrFail($id);
        return view('dashboard.admin.profile', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = Admin::findOrFail($id);
        return view('dashboard.admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminEditProfileRequest $request, $id)
    {
        // Find the admin or throw a 404 error
        $admin = Admin::findOrFail($id);
        // Gather all input data except the image
        $data = $request->except('image');
        // Handle image upload and deletion of the old image
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($admin->image && Storage::disk('public')->exists($admin->image)) {
                Storage::disk('public')->delete($admin->image);
            }
            // Store the new image
            $imagePath = Storage::disk('public')->put('admin', $request->file('image'));
            $data['image'] = $imagePath;
        }
        $admin->update($data);
        return redirect()->route('dashboard.adminprofile.show', $admin->id)->with('success', 'Your profile updated successfully');
    }
}
