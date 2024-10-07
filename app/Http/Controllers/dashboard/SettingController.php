<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::all();
        return view('dashboard.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SettingRequest $request)
    {
        Setting::create([
            'key' => $request->key,
            'value' => $request->value,
            'is_visible' => $request->is_visible ? "none" : "",
        ]);
        return redirect()->route('dashboard.setting.index')->with('success', 'Content created successfully');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     $setting = Setting::find($id);
    //     return view('admin.settings.show', compact('setting'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $setting = Setting::find($id);
        return view('dashboard.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SettingRequest $request, string $id)
    {
        $setting = Setting::find($id);
        $setting->update([
            'key' => $request->key,
            'value' => $request->value,
            'is_visible' => $request->is_visible ? "none" : "",
        ]);
        return redirect()->route('dashboard.setting.index')->with('success', 'Content created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $setting = Setting::find($id);
        $setting->delete();
        return redirect()->route('dashboard.setting.index')->with('success', 'Content deleted successfully');
    }
}
