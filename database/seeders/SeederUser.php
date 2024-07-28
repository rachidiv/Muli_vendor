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
            'name' => 'Rachid benchahraine',
            'email' => 'rachidbnchahraine@gamil.com',
            'password' => Hash::make('0000'),
            'phone_number' => '0624020084',
        ]);
    }
}