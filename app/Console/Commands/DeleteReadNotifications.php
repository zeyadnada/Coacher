<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DeleteReadNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notifications:delete-read';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete read notifications from the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::table('notifications')->whereNotNull('read_at')->delete();
        $this->info('Read notifications deleted successfully.');
    }
}
