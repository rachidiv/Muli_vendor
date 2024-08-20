<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SeederUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'user2',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('0000'),
            'phone_number' => '0624020080',
            'store_id' => '2'
        ]);
    }
}