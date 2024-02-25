<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            ['name' => 'admin', 'guard_name' => 'web'],
            ['name' => 'petugas', 'guard_name' => 'web'],
            ['name' => 'peminjam', 'guard_name' => 'web'],
        ]);

        $admin = new User();

        $admin->username = "ADMIN";
        $admin->password = bcrypt("password");
        $admin->email = "admin@gmail.com";
        $admin->role = "admin";
        $admin->save();
        $admin->assignRole('admin');

        $petugas = new User();
        $petugas->username = "PETUGAS";
        $petugas->password = bcrypt("password");
        $petugas->email = "petugas@gmail.com";
        $petugas->role = "petugas";
        $petugas->save();
        $petugas->assignRole('petugas');

        $user = new User();
        $user->username = "FATHIR";
        $user->password = bcrypt("password");
        $user->email = "peminjam@gmail.com";
        $user->role = "peminjam";
        $user->save();
        $user->assignRole('peminjam');
    }
}
