<?php

namespace App\Console;

use App\Jobs\DeletePendingSubscriptions;
use App\Jobs\SendPendingSubscriptionsReminderMessage;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('notifications:delete-read')->dailyAt('05:00');
        // $schedule->job(new SendPendingSubscriptionsReminderMessage)->dailyAt('09:00');
        // $schedule->job(new DeletePendingSubscriptions)->dailyAt('10:00');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}