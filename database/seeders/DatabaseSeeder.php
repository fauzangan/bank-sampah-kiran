<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\JenisSampah;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        JenisSampah::create([
            'nama_sampah' => 'Botol Kaca',
            'harga_penarikan_kg' => 3500,
            'harga_setoran_kg' => 2000,
        ]);

        JenisSampah::create([
            'nama_sampah' => 'Botol Plastik',
            'harga_penarikan_kg' => 2500,
            'harga_setoran_kg' => 1000,
        ]);
    }
}
