<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        return view('user.index');
    }
}
