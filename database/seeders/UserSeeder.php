<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('+3ev123');

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => $password,
            'api_token' => $password
        ]);
    }
}
