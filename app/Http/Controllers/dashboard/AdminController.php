<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminEditProfileRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::all();

        return view('dashboard.admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminEditProfileRequest $request)
    {
        $data = $request->except('image', 'password_confirmation');
        if ($request->hasFile('image')) {
            $imagePath = Storage::disk('public')->put('admin',  $request->image);
            $data['image'] = $imagePath;
        }
        $admin = Admin::create($data);
        return redirect()->route('dashboard.admin.show', $admin->id)->with('success', 'Admin Updated successfully');
    }

    /**
     * Display the specified resource.
     */
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
    public function update(AdminEditProfileRequest $request, string $id)
    {

        $admin = Admin::findOrFail($id);
        // dd($admin);
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            if ($admin->image && Storage::disk('public')->exists($admin->image)) {
                Storage::disk('public')->delete($admin->image);
            }
            $imagePath = Storage::disk('public')->put('admin', $request->image);
            $data['image'] = $imagePath;
        }
        $admin->update($data);
        return redirect()->route('dashboard.admin.show', $admin->id)->with('success', 'Admin Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = Admin::findOrFail($id);
        if ($admin->image && Storage::disk('public')->exists($admin->image)) {
            Storage::disk('public')->delete($admin->image);
        }
        $admin->delete();
        return back()->with('success', 'Admin Deleted Successfully.');
    }
    public function makeAdmin($id){
        $user = Admin::findOrFail($id);
        $user->admin_type = "admin";
        $user->save();
        return back()->with('success', 'User Made Admin Successfully.');
    }
    public function makeSuperAdmin($id)
    {
        $user = Admin::findOrFail($id);
        $user->admin_type = "super_admin";
        $user->save();
        return back()->with('success', 'User Made Super Admin Successfully.');
    }
}