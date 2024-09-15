<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Coupon;
use App\Models\Subscription;
use App\Models\Trainer;
use App\Models\TrainingPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomePage extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    // public function __invoke(Request $request)
    // {

    //     $trainersCount = Trainer::count();
    //     $couponsCount = Coupon::count();
    //     $adminsCount = Admin::count();
    //     $packagesCount = TrainingPackage::count();

    //     $paidSubscriptions = Subscription::select(DB::raw('COUNT(*) as count'), DB::raw('MONTH(created_at) as month'))
    //         ->where('payment_status', 'Paid')
    //         ->groupBy(DB::raw('MONTH(created_at)'))
    //         ->pluck('count', 'month');

    //     $canceledSubscriptions = Subscription::select(DB::raw('COUNT(*) as count'), DB::raw('MONTH(created_at) as month'))
    //         ->where('payment_status', 'Cancelled')
    //         ->groupBy(DB::raw('MONTH(created_at)'))
    //         ->pluck('count', 'month');

    //     $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    //     $paidData = [];
    //     $canceledData = [];

    //     foreach (range(1, 12) as $month) {
    //         $paidData[] = $paidSubscriptions->get($month, 0);
    //         $canceledData[] = $canceledSubscriptions->get($month, 0);
    //     }
    //     return view('dashboard.index', compact('adminsCount', 'trainersCount', 'packagesCount', 'couponsCount', 'months', 'paidData', 'canceledData'));
    // }

    public function __invoke(Request $request)
    {
        // Get the counts of different entities
        $trainersCount = Trainer::count();
        $couponsCount = Coupon::count();
        $adminsCount = Admin::count();
        $packagesCount = TrainingPackage::count();

        // Fetch subscription counts grouped by month and payment status
        $subscriptions = Subscription::select(DB::raw('COUNT(*) as count'), DB::raw('MONTH(created_at) as month'), 'payment_status')
            ->whereIn('payment_status', ['Paid', 'Cancelled'])
            ->groupBy(DB::raw('MONTH(created_at)'), 'payment_status')
            ->get()
            ->groupBy('payment_status');


        // Initialize months and data arrays with 0 for each month (from index 0 for the chart)
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $paidData = array_fill(0, 12, 0); // Index starts from 0 for charts
        $canceledData = array_fill(0, 12, 0);

        // Process the fetched subscription data
        foreach ($subscriptions as $status => $data) {
            foreach ($data as $item) {
                $month = $item->month - 1; // Subtract 1 to match the 0-based index expected by the chart
                $count = $item->count;
                if ($status === 'Paid') {
                    $paidData[$month] = $count;
                } elseif ($status === 'Cancelled') {
                    $canceledData[$month] = $count;
                }
            }
        }
        // Return view with all the required data
        return view('dashboard.index', compact('adminsCount', 'trainersCount', 'packagesCount', 'couponsCount', 'months', 'paidData', 'canceledData'));
    }
}
