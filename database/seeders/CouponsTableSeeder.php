<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Coupon::create([
            'code' => 'FIRST10',
            'percent_off' => 10,
            'type' => 'percent',

        ]);
        Coupon::create([
            'code' => 'FIRST11',
            'value' => 10,
            'type' => 'fixed',
        ]);
    }
}
