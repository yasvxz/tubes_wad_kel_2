<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nama' => 'Admin Telkom',
            'nim' => '102022300000',
            'username_sso' => 'admin@telkomuniv.ac.id',
            'password' => Hash::make('password123'), // Wajib di-hash!
        ]);
    }
}
