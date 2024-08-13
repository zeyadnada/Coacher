<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TrainerCreatedNotification  extends Notification implements ShouldQueue
{
    use Queueable;

    private $trainer;
    /**
     * Create a new notification instance.
     */
    public function __construct($trainer)
    {
        $this->trainer = $trainer;
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
    /**
     * Get the database notification.
     */
    public function toDatabase($notifiable): array
    {
        return [
            'body' => "new Trainer {$this->trainer->name} Added",
            'url' =>  url("/dashboard/trainers/{$this->trainer->id}")
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
