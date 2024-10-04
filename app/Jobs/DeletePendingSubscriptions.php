<?php

namespace App\Jobs;

use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DeletePendingSubscriptions implements ShouldQueue
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
        // Get the current time minus 2 days
        $twoDaysAgo = Carbon::now()->subDays(2);

        // Delete subscriptions where payment_status is 'pending' and older than 2 days
        Subscription::where('payment_status', 'pending')
            ->where('created_at', '<=', $twoDaysAgo)
            ->delete();
    }
}
