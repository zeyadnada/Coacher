<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            [
                'name' => 'super admin',
                'phone' => '1234567890',
                'gender' => 'male',
                'location' => 'cairo',
                'email' => 'zeyadn355@gmail.com',
                'image' => 'path/to/image1.jpg',
                'email_verified_at' => now(),
                'password' => Hash::make('admin123'),
                'admin_type' => 'super_admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
           
        ]);
    }
}