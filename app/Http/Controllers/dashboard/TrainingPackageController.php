<?php

namespace App\Http\Controllers\dashboard;

use App\Exceptions\CannotDeleteRecordException;
use App\Http\Controllers\Controller;
use App\Http\Requests\TrainingPackageRequest;
use App\Models\Admin;
use App\Models\TrainingPackage;
use App\Models\TrainingPackageDuration;
use App\Notifications\TrainingPackageCreatedNotification;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class TrainingPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = TrainingPackage::select('id', 'title')->with('durations')->get();
        return view('dashboard.training_package.index', compact('packages'));
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
        $data = $request->except('image', 'durations');
        if ($request->hasFile('image')) {
            $imagePath = Storage::disk('public')->put('package',  $request->image);
            $data['image'] = $imagePath;
        }
        $package = TrainingPackage::create($data);

        $durationsData = [];
        foreach ($request->durations as $duration) {
            $durationsData[] = [
                'duration' => $duration['duration'],
                'price' => $duration['price'],
                'discount_price' => $duration['discount_price'] ?? null,
                'package_id' => $package->id,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        TrainingPackageDuration::insert($durationsData);

        //notification event
        $admins = Admin::all();
        Notification::send($admins, new TrainingPackageCreatedNotification($package));
        return redirect()->route('dashboard.training-packages.show', $package->id)->with('success', 'Training Package Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $package = TrainingPackage::with('durations')->findOrFail($id);
        return view('dashboard.training_package.show', compact('package'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $package = TrainingPackage::with('durations')->findOrFail($id);
        return view('dashboard.training_package.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TrainingPackageRequest $request, $id)
    {
        $package = TrainingPackage::with('durations')->findOrFail($id);
        $data = $request->except('image', 'durations');

        // Handle image upload
        if ($request->hasFile('image')) {
            if ($package->image && Storage::disk('public')->exists($package->image)) {
                Storage::disk('public')->delete($package->image);
            }
            $imagePath = Storage::disk('public')->put('package', $request->image);
            $data['image'] = $imagePath;
        }

        // Update the training package
        $package->update($data);

        // Get existing durations from the database
        $existingDurations = $package->durations->pluck('id')->toArray();

        // Get duration IDs from the submitted request
        $submittedDurations = collect($request->input('durations'))->filter(function ($duration) {
            return isset($duration['id']); // Only consider existing rows (those with an ID)
        })->pluck('id')->toArray();

        // Determine the durations to delete
        $durationsToDelete = array_diff($existingDurations, $submittedDurations);

        // Delete durations that were removed from the form in a single query
        if (!empty($durationsToDelete)) {
            try {
                TrainingPackageDuration::whereIn('id', $durationsToDelete)->delete();
            } catch (QueryException $e) {
                // Check for SQL error code 23000 (foreign key constraint violation)
                if ($e->getCode() == "23000") {
                    throw new CannotDeleteRecordException('Cannot delete this duration because it is associated with one or more active subscriptions.');
                } else {
                    // Re-throw the exception if it's another type of database error
                    throw $e;
                }
            }
        }

        // Prepare the durations data for update or creation
        $durationsData = [];
        foreach ($request->durations as $duration) {
            if (isset($duration['id'])) {
                // Update existing duration
                $package->durations()->where('id', $duration['id'])->update([
                    'duration' => $duration['duration'],
                    'price' => $duration['price'],
                    'discount_price' => $duration['discount_price'] ?? null,
                ]);
            } else {
                // Prepare new duration for insertion
                $durationsData[] = [
                    'duration' => $duration['duration'],
                    'price' => $duration['price'],
                    'discount_price' => $duration['discount_price'] ?? null,
                    'package_id' => $package->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert new durations data if any
        if (!empty($durationsData)) {
            TrainingPackageDuration::insert($durationsData);
        }

        return redirect()->route('dashboard.training-packages.show', $package->id)->with('success', 'Trainer Package Updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $package = TrainingPackage::findOrFail($id);

        try {
            if ($package->image && Storage::disk('public')->exists($package->image)) {
                Storage::disk('public')->delete($package->image);
            }
            $package->delete();
        } catch (QueryException $e) {
            if ($e->getCode() == "23000") {
                throw new CannotDeleteRecordException('Cannot delete this package because it has associated subscriptions.');
            }
            throw $e; // Re-throw for other database errors

        }
        return back()->with('success', 'Training Package Deleted Successfully.');
    }
}
