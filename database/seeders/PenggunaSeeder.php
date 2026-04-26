<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['nama' => 'Budi Santoso', 'email' => 'budi.santoso@gmail.com'],
            ['nama' => 'Siti Aminah', 'email' => 'siti.aminah@yahoo.com'],
            ['nama' => 'Andi Wijaya', 'email' => 'andi.wijaya@outlook.com'],
            ['nama' => 'Dewi Lestari', 'email' => 'dewi.lestari@gmail.com'],
            ['nama' => 'Rizky Pratama', 'email' => 'rizky.pratama@wellsense.io'],
        ];

        foreach ($users as $u) {
            Pengguna::create([
                'nama' => $u['nama'],
                'email' => $u['email'],
                'kata_sandi' => Hash::make('wellsense')
            ]);
        }

        $this->command->info('Data Pengguna berhasil dibuat!');
    }
}