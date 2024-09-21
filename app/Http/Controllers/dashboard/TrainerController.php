<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrainerRequest;
use App\Models\Admin;
use App\Models\Trainer;
use App\Notifications\TrainerCreatedNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch trainers along with the count of their subscriptions
        $trainers = Trainer::select('id', 'name', 'email', 'phone', 'job_title')->withCount('subscriptions')->get();
        return view('dashboard.trainer.index', compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.trainer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TrainerRequest $request)
    {
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $imagePath = Storage::disk('public')->put('trainer',  $request->image);
            $data['image'] = $imagePath;
        }
        $trainer = Trainer::create($data);
        //notification event
        $admins = Admin::all();
        Notification::send($admins, new TrainerCreatedNotification($trainer));

        return redirect()->route('dashboard.trainers.show', $trainer->id)->with('success', 'Trainer Updated successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $trainer = Trainer::withCount('subscriptions')->findOrFail($id);
        return view('dashboard.trainer.show', compact('trainer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $trainer = Trainer::findOrFail($id);
        return view('dashboard.trainer.edit', compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TrainerRequest $request, $id)
    {
        $trainer = Trainer::findOrFail($id);
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            if ($trainer->image && Storage::disk('public')->exists($trainer->image)) {
                Storage::disk('public')->delete($trainer->image);
            }
            $imagePath = Storage::disk('public')->put('trainer', $request->image);
            $data['image'] = $imagePath;
        }
        $trainer->update($data);
        return redirect()->route('dashboard.trainers.show', $trainer->id)->with('success', 'Trainer Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $trainer = Trainer::findOrFail($id);
        if ($trainer->image && Storage::disk('public')->exists($trainer->image)) {
            Storage::disk('public')->delete($trainer->image);
        }
        $trainer->delete();
        return back()->with('success', 'Trainer Deleted Successfully.');
    }
}