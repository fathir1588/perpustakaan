<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate(); // Menyegarkan data tabel sebelum menambahkan data baru
        User::create([
            'username' => 'Admin',
            'level' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'), // Menggunakan Hash::make untuk mengenkripsi password
            'remember_token' => Str::random(60),
        ]);
    }
}
