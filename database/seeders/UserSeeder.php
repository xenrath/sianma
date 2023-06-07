<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'nama' => 'Developer',
                'username' => 'developer',
                'password' => bcrypt('developer'),
                'role' => 'dev'
            ],
            [
                'nama' => 'Admin',
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'role' => 'admin'
            ],
            [
                'nama' => 'Petugas 1',
                'username' => 'petugas1',
                'password' => bcrypt('petugas1'),
                'role' => 'petugas'
            ],
            [
                'nama' => 'Petugas 2',
                'username' => 'petugas2',
                'password' => bcrypt('petugas2'),
                'role' => 'petugas'
            ],
        ];

        User::insert($users);
    }
}
