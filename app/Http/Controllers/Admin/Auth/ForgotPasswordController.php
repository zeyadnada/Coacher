<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
// use Password;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;
    //do not forget to cahnge the route in ResetPassword.php to admin.......

    protected function broker()
    {
        return Password::broker('admins'); // Use the 'admins' broker
    }
    public function showLinkRequestForm()
    {
        return view('dashboard.auth.passwords.email'); // Admin view for requesting reset
    }
}
