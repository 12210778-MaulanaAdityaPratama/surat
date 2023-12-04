<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Tambahkan logic seeding di sini
        User::create([
            'name' => 'Bontot W.K',
            'nip' => '197705262017101001',
            'email' => 'bontot@gmail.com',
            'password' => bcrypt('bontot'), // Pastikan password sudah di-hash
            'role' => 'admin',
            'foto' => '',
        ]);
    }
}
