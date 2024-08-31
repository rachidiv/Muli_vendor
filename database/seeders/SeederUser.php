<?php

namespace Database\Seeders;

use App\Models\Admin;
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
        Admin::create([
            'name'=>'admin1',
            'username' => 'admin1',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('0000'),
            'phone_number' => '0624070080',
        ]);
    }
}