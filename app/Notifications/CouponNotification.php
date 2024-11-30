<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CouponNotification extends Notification
{
    use Queueable;
    private $coupon;
    private $action;

    /**
     * Create a new notification instance.
     */
    public function __construct($coupon, $action)
    {
        $this->coupon = $coupon;
        $this->action = $action;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }



    public function toDatabase($notifiable): array
    {
        $body = "";
        if ($this->action === 'add') {
            $body = "new Coupon ({$this->coupon->code}) Added";
        } elseif ($this->action === 'delete') {
            $body = "Coupon ({$this->coupon->code}) Deleted";
        } else {
            $body = "Coupon ({$this->coupon->code}) Updated";
        }
        return [
            'body' => $body,
            'url' =>  url("/dashboard/coupons")
        ];
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}