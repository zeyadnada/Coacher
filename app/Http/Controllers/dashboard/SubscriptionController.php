<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptionRequet;
use App\Models\Subscription;
use App\Models\Trainer;
use App\Models\TrainingPackage;
use App\Models\User;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscriptions = Subscription::with(['user', 'package', 'trainer'])->get();
        return view('dashboard.subscription.index', compact('subscriptions'));
    }

    public function paid()
    {
        $subscriptions = Subscription::with(['user', 'package', 'trainer'])->where('status', 'Paid')->get();
        return view('dashboard.subscription.index', compact('subscriptions'));
    }

    public function pending()
    {
        $subscriptions = Subscription::with(['user', 'package', 'trainer'])->where('status', 'Pending')->get();
        return view('dashboard.subscription.index', compact('subscriptions'));
    }

    public function canceled()
    {
        $subscriptions = Subscription::with(['user', 'package', 'trainer'])->where('status', 'Canceled')->get();
        return view('dashboard.subscription.index', compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $packages = TrainingPackage::all();
        $trainers = Trainer::all();
        return view('dashboard.subscription.create', compact('users', 'packages', 'trainers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubscriptionRequet $request)
    {
        Subscription::create($request->all());
        return redirect()->route('dashboard.subscriptions.index')->with('success', 'Subscription Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subscription = Subscription::findOrFail($id);
        $users = User::select('id', 'name')->get();
        $packages = TrainingPackage::select('id', 'title')->get();
        $trainers = Trainer::select('id', 'name')->get();
        return view('dashboard.subscription.edit', compact('subscription', 'users', 'packages', 'trainers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubscriptionRequet $request, $id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->update($request->all());
        return redirect()->route('dashboard.subscriptions.index')->with('success', 'Subscription Updated Successfully');
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
