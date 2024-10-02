<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptionRequet;
use App\Models\Subscription;
use App\Models\Trainer;
use App\Models\TrainingPackage;
use App\Models\TrainingPackageDuration;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscriptions = Subscription::with(['package:id,title', 'duration:id,duration', 'trainer:id,name'])
            ->orderBy('created_at', 'desc')
            ->get();
        $title = 'All Subscriptions';
        return view('dashboard.subscription.index', compact('subscriptions', 'title'));
    }

    public function paid()
    {
        $subscriptions = Subscription::with(['package:id,title', 'duration:id,duration', 'trainer:id,name'])
            ->where('payment_status', 'Paid')
            ->orderBy('created_at', 'desc')
            ->get();
        $title = 'All Paid Subscriptions';
        return view('dashboard.subscription.index', compact('subscriptions', 'title'));
    }

    public function pending()
    {
        $subscriptions = Subscription::with(['package:id,title', 'duration:id,duration', 'trainer:id,name'])
            ->where('payment_status', 'Pending')
            ->orderBy('created_at', 'desc')
            ->get();
        $title = 'All Pending Subscriptions';
        return view('dashboard.subscription.index', compact('subscriptions', 'title'));
    }

    public function canceled()
    {
        $subscriptions = Subscription::with(['package:id,title', 'duration:id,duration', 'trainer:id,name'])
            ->where('payment_status', 'Cancelled')
            ->orderBy('created_at', 'desc')
            ->get();
        $title = 'All Canceled Subscriptions';
        return view('dashboard.subscription.index', compact('subscriptions', 'title'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $packages = TrainingPackage::select('id', 'title')->get();
        $trainers = Trainer::select('id', 'name')->get();
        return view('dashboard.subscription.create', compact('packages', 'trainers'));
    }

    /**
     * get durations related to specific package
     */
    public function getDurations($packageId)
    {
        $durations = TrainingPackageDuration::where('package_id', $packageId)->get();
        return response()->json($durations);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubscriptionRequet $request)
    {
        $subscription = Subscription::create($request->all());
        return redirect()->route('dashboard.subscriptions.show', $subscription->id)->with('success', 'Subscription Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $subscription = Subscription::with(['package:id,title', 'duration:id,duration', 'trainer:id,name'])->findOrFail($id);
        return view('dashboard.subscription.show', compact('subscription'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subscription = Subscription::findOrFail($id);
        $packages = TrainingPackage::select('id', 'title')->get();
        $trainers = Trainer::select('id', 'name')->get();
        return view('dashboard.subscription.edit', compact('subscription', 'packages', 'trainers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubscriptionRequet $request, $id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->update($request->all());
        return redirect()->route('dashboard.subscriptions.show', $subscription->id)->with('success', 'Subscription Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();
        return redirect()->route('dashboard.subscriptions.index')->with('success', 'Subscription Deleted Successfully');
    }
}