<?php

namespace App\Http\Controllers\Admin\Auth;

// namespace Illuminate\Foundation\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



// use Password;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;
    protected $redirectTo = '/dashboard/home'; // Redirect path after password reset


    protected function broker()
    {
        return Password::broker('admins'); // Use the 'admins' broker
    }

    public function showResetForm(Request $request)
    {
        $token = $request->route()->parameter('token');

        return view('dashboard.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }


    protected function guard()
    {
        return Auth::guard('admin'); // Admin guard
    }
    protected function reset(Request $request)
    {
        // Validate the request
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'token' => 'required',
        ]);

        // Attempt to reset the password
        $response = Password::broker('admins')->reset(
            $this->credentials($request),
            function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        // Check the response and return the appropriate response
        if ($response == Password::PASSWORD_RESET) {
            return $this->sendResetResponse($request, $response);
        } else {
            return $this->sendResetFailedResponse($request, $response);
        }
    }
}
