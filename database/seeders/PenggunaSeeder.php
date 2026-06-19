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
            [
                'nama' => 'Ubaidillah',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '2002-05-10',
                'email' => 'ubayd2947@gmail.com',
            ],
            [
                'nama' => 'Siti Aminah',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1992-08-20',
                'email' => 'siti.aminah@yahoo.com',
            ],
            [
                'nama' => 'Andi Wijaya',
                'jenis_kelamin' => 'L',
                'email' => 'andi.wijaya@outlook.com',
                'tanggal_lahir' => '1988-03-10',
            ],
            [
                'nama' => 'Dewi Lestari',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1995-11-25',
                'email' => 'dewi.lestari@gmail.com',
            ],
            [
                'nama' => 'Rizky Pratama',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1993-07-30',
                'email' => 'rizky.pratama@wellsense.io',
            ],
        ];

        foreach ($users as $u) {
            Pengguna::create([
                'nama' => $u['nama'],
                'jenis_kelamin' => $u['jenis_kelamin'],
                'tanggal_lahir' => $u['tanggal_lahir'],
                'email' => $u['email'],
                'kata_sandi' => Hash::make('wellsense')
            ]);
        }

        $this->command->info('Data Pengguna berhasil dibuat!');
    }
}
