<?php

namespace App\Http\Controllers\appendages;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function markAsRead($id)
    {
        $user = $this->getAuthenticatedUser();

        if ($user) {
            // Fetch the specific unread notification
            $notification = $user->notifications->find($id);

            if ($notification) {
                // Mark the notification as read
                $notification->markAsRead();

                // Redirect based on notification data
                return redirect($notification->data['url']);
            }

            return redirect()->back();
        }

        return redirect()->back();
    }


    public function markAllAsRead()
    {
        $user = $this->getAuthenticatedUser();

        if ($user) {
            // Mark all unread notifications as read
            $user->unreadNotifications->markAsRead();
        }
        return redirect()->back();
    }

    private function getAuthenticatedUser()
    {
        // Check which guard is currently authenticated
        if (Auth::guard('admin')->check()) {
            return Auth::guard('admin')->user();
        } elseif (Auth::guard('user')->check()) {
            return Auth::guard('user')->user();
        }

        return null;
    }
}