<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\JenisSampah;
use \App\Models\User;

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

        User::create([
            'role' => 1,
            'nama' => 'Fauzan Zaman',
            'email' => 'test1@gmail.com',
            'password' => bcrypt('password'),
            'alamat' => 'test',
            'no_telepon' => '012931293'
        ]);

        User::create([
            'role' => 2,
            'nama' => 'Ilyasa',
            'email' => 'test2@gmail.com',
            'password' => bcrypt('password'),
            'alamat' => 'test',
            'no_telepon' => '129302193290'
        ]);

        User::create([
            'role' => 3,
            'nama' => 'Lukman',
            'email' => 'test3@gmail.com',
            'password' => bcrypt('password'),
            'alamat' => 'test',
            'no_telepon' => '01209128390128'
        ]);

        User::create([
            'role' => 3,
            'nama' => 'Syahrul',
            'email' => 'test4@gmail.com',
            'password' => bcrypt('password'),
            'alamat' => 'test',
            'no_telepon' => '12412312312',
            'isActive' => 0
        ]);

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
