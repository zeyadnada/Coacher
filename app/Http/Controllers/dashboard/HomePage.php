<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\appendages\WhatsAppController;
use App\Http\Controllers\Controller;
use App\Models\Subscription;
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
    public function __invoke(Request $request)
    {
        // (new WhatsAppController())->order_confirmation(env('WHATSAPP_PHONE_NUMBER_ID'), 'zeeyyaadd', '201208776273', 'ooio');

        // return view('dashboard.index');
        $paidSubscriptions = Subscription::select(DB::raw('COUNT(*) as count'), DB::raw('MONTH(created_at) as month'))
        ->where('payment_status', 'Paid')
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->pluck('count', 'month');

        $canceledSubscriptions = Subscription::select(DB::raw('COUNT(*) as count'), DB::raw('MONTH(created_at) as month'))
        ->where('payment_status', 'Cancelled')
        ->groupBy(DB::raw('MONTH(created_at)'))
        ->pluck('count', 'month');

        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $paidData = [];
        $canceledData = [];

        foreach (range(1, 12) as $month) {
            $paidData[] = $paidSubscriptions->get($month, 0);
            $canceledData[] = $canceledSubscriptions->get($month, 0);
        }
        return view('dashboard.index', compact('months', 'paidData', 'canceledData'));
        // return view('dashboard.index');
    }
}