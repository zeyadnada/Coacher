<?php

namespace App\Jobs;

use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendPendingSubscriptionsReminderMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Get subscriptions that are still pending and are less than 2 days old
        $oneDayAgo = Carbon::now()->subDay(1);

        $pendingSubscriptions = Subscription::where('payment_status', 'pending')
            ->where('created_at', '<=', $oneDayAgo)
            ->get();

        foreach ($pendingSubscriptions as $subscription) {
            // Send reminder whatsapp message
            
        }
    }
}