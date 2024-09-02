<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\traits\EnvUpdater;
use Illuminate\Http\Request;



class PaymentconfigController extends Controller
{
    use EnvUpdater;
    public function index()
    {
        return view('dashboard.settings.payment_methods');
    }

    public function updatePaymentConfig(Request $request)
    {
        $keys = $request->except('_token'); // Get all inputs except CSRF token
        foreach ($keys as $key => $value) {
            $this->updateEnvFile($key, $value);
        }

        return redirect()->back()->with('success', 'Environment variables updated successfully!');
    }
}