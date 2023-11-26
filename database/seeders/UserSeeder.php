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
            'name' => 'aditya',
            'nip' => '12210778',
            'email' => 'aditya.neo5@gmail.com',
            'password' => bcrypt('aditya'), // Pastikan password sudah di-hash
            'role' => 'admin',
        ]);
    }
}
