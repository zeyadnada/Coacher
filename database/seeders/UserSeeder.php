<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'zeyad ayman nada',
            'phone' => '11111111111',
            'gender' => 'male',
            'email' => 'user1@gmail.com',
            'image' => null,
            'password' => Hash::make('11111111'),
        ]);

        User::create([
            'name' => 'ahmed mohamed',
            'phone' => '22222222222',
            'gender' => 'female',
            'email' => 'user2.@gmail.com',
            'image' => null,
            'password' => Hash::make('22222222'),
        ]);
    }
}