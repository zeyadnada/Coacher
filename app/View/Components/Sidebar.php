<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public $noTrainerCount;

    public function __construct()
    {
        // Count subscriptions where trainer_id is null and cache the result for 1 minute
        $this->noTrainerCount = Cache::remember('no_trainer_subscription_count', 60, function () {
            return DB::table('subscriptions')
                ->whereNull('trainer_id')
                ->count();
        });
    }

    public function render()
    {
        return view('components.Sidebar');
    }
}