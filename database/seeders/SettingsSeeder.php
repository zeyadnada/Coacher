<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create(['key' => 'offers', 'value' => 'العروض متاحة لفترة محدودة', 'is_visible' => 'none']);
        Setting::create(['key' => 'title', 'value' => 'مع بعض هنغير الواقع', 'is_visible' => '']);
    }
}
