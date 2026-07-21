<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed akun pengelola website STEI ITB.
     *
     * Hanya 3 akun: 1 administrator dan 2 pengelola konten.
     * Pengguna publik (mahasiswa, dosen, alumni, dll.) tidak memerlukan akun
     * karena mereka hanya mengakses website tanpa login.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Andi Prasetyo',
                'email' => 'andi.admin@example.test',
                'role' => 'admin',
            ],
            [
                'name' => 'Sari Wulandari',
                'email' => 'sari.konten@example.test',
                'role' => 'content_creator',
            ],
            [
                'name' => 'Rizal Firmansyah',
                'email' => 'rizal.konten@example.test',
                'role' => 'content_creator',
            ],
        ];

        foreach ($users as $userData) {
            User::updateOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'password' => Hash::make('password'),
                    'role' => $userData['role'],
                    'email_verified_at' => now(),
                ]
            );
        }
    }
}
