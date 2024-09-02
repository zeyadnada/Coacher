<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\appendages\WhatsAppController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        (new WhatsAppController())->order_confirmation(env('WHATSAPP_PHONE_NUMBER_ID'), 'zeeyyaadd', '201208776273', 'ooio');

        return view('dashboard.index');
    }
}
