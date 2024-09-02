<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\traits\EnvUpdater;


class WhatsAppConfigontroller extends Controller
{
    use EnvUpdater;

    public function index()
    {
        return view('dashboard.settings.whatsApp_config');
    }

    public function updateWhatsAppConfig(Request $request)
    {
        $keys = $request->except('_token'); // Get all inputs except CSRF token
        foreach ($keys as $key => $value) {
            $this->updateEnvFile($key, $value);
        }

        return redirect()->back()->with('success', 'Environment variables updated successfully!');
    }
}
