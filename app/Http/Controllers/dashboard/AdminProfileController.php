<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminEditProfileRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    public function show(string $id)
    {
        $admin = Admin::findOrFail($id);
        return view('dashboard.profile.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = Admin::findOrFail($id);
        return view('dashboard.profile.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminEditProfileRequest $request, $id)
    {
        // Find the admin or throw a 404 error
        $admin = Admin::findOrFail($id);

        // Gather all input data except the image and password
        $data = $request->except('image','password','password_confirmation');

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

        // Handle password update if provided
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // Update the admin with the gathered data
        $admin->update($data);

        // Redirect back with a success message
        return redirect()->route('dashboard.adminprofile.show', $admin->id)->with('success', 'Your profile updated successfully');
    }
}