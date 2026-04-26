<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pengguna;
use App\Models\Perangkat;

class PerangkatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua pengguna yang sudah ada di DB
        $users = Pengguna::all();

        if ($users->isEmpty()) {
            $this->command->error('Gagal buat perangkat: Data Pengguna masih kosong!');
            return;
        }

        // Kita tentukan token fix di sini agar tidak berubah-ubah
        $assignments = [
            ['user_idx' => 0, 'name' => 'WellSense Home',    'token' => 'WS-866501012348821'],
            ['user_idx' => 0, 'name' => 'WellSense Office',  'token' => 'WS-921038475621003'],
            ['user_idx' => 1, 'name' => 'Personal Tracker', 'token' => 'WS-102938475612345'],
            ['user_idx' => 1, 'name' => 'Elderly Monitor',  'token' => 'WS-556677889900112'],
            ['user_idx' => 2, 'name' => 'WellSense Pro',     'token' => 'WS-443322110099887'],
            ['user_idx' => 3, 'name' => 'Lestari Care',      'token' => 'WS-778811223344556'],
            ['user_idx' => 4, 'name' => 'Rizky Watch',       'token' => 'WS-990011228833774'],
        ];

        foreach ($assignments as $task) {
            if (isset($users[$task['user_idx']])) {
                Perangkat::create([
                    'pengguna_id'     => $users[$task['user_idx']]->id,
                    'token_perangkat' => $task['token'], // Menggunakan token fix dari array
                    'nama_perangkat'  => $task['name']
                ]);
            }
        }

        $this->command->info('Data Perangkat dengan Token Fix berhasil dibuat!');
    }
}