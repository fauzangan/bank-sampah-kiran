<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BukuRekening;
use Illuminate\Database\Seeder;
use \App\Models\JenisSampah;
use App\Models\Loadcell;
use \App\Models\User;
use Carbon\Carbon;

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

        Loadcell::create([
            'weight' => 0
        ]);

        User::create([
            'role' => 1,
            'nama' => 'Fauzan Zaman',
            'email' => 'test1@gmail.com',
            'password' => bcrypt('password'),
            'alamat' => '-',
            'no_telepon' => '-'
        ]);

        User::create([
            'role' => 2,
            'nama' => 'Ilyasa Aliajrun',
            'email' => 'petugas1@gmail.com',
            'password' => bcrypt('password'),
            'alamat' => '-',
            'no_telepon' => '081231284433'
        ]);

        User::create([
            'role' => 2,
            'nama' => 'Rizky Kurniawan',
            'email' => 'petugas2@gmail.com',
            'password' => bcrypt('password'),
            'alamat' => '-',
            'no_telepon' => '085312452233'
        ]);

        User::create([
            'role' => 3,
            'nama' => 'Lukman Ernandi',
            'email' => 'nasabah1@gmail.com',
            'password' => bcrypt('password'),
            'alamat' => fake()->address(),
            'no_telepon' => '087212853311'
        ]);

        User::create([
            'role' => 3,
            'nama' => 'Syahrul Ramadhan',
            'email' => 'nasabah2@gmail.com',
            'password' => bcrypt('password'),
            'alamat' => fake()->address(),
            'no_telepon' => fake()->unique()->phoneNumber(),
            'isActive' => 0
        ]);

        User::create([
            'role' => 3,
            'nama' => 'Faisal Ahmad',
            'email' => 'nasabah3@gmail.com',
            'password' => bcrypt('password'),
            'alamat' => fake()->address(),
            'no_telepon' => fake()->unique()->phoneNumber(),
        ]);

        User::create([
            'role' => 3,
            'nama' => 'Ahmad Dafa',
            'email' => 'nasabah4@gmail.com',
            'password' => bcrypt('password'),
            'alamat' => fake()->address(),
            'no_telepon' => fake()->unique()->phoneNumber(),
        ]);

        User::create([
            'role' => 3,
            'nama' => 'Sujiwo Tejo',
            'email' => 'nasabah5@gmail.com',
            'password' => bcrypt('password'),
            'alamat' => fake()->address(),
            'no_telepon' => fake()->unique()->phoneNumber(),
        ]);

        User::create([
            'role' => 3,
            'nama' => 'Fajar Syidik',
            'email' => 'nasabah6@gmail.com',
            'password' => bcrypt('password'),
            'alamat' => fake()->address(),
            'no_telepon' => fake()->unique()->phoneNumber(),
        ]);

        User::create([
            'role' => 3,
            'nama' => 'Ahmad Yudha',
            'email' => 'nasabah7@gmail.com',
            'password' => bcrypt('password'),
            'alamat' => fake()->address(),
            'no_telepon' => fake()->unique()->phoneNumber(),
        ]);


        JenisSampah::create([
            'nama_sampah' => 'Kardus',
            'harga_penarikan_kg' => 1500,
            'harga_setoran_kg' => 3000,
        ]);

        JenisSampah::create([
            'nama_sampah' => 'Kertas',
            'harga_penarikan_kg' => 2100,
            'harga_setoran_kg' => 2750,
        ]);

        JenisSampah::create([
            'nama_sampah' => 'Botol Kaca',
            'harga_penarikan_kg' => 2950,
            'harga_setoran_kg' => 4000,
        ]);

        JenisSampah::create([
            'nama_sampah' => 'Botol Plastik',
            'harga_penarikan_kg' => 1450,
            'harga_setoran_kg' => 2850,
        ]);

        BukuRekening::create([
            'id_nasabah' => 3
        ]);

        BukuRekening::create([
            'id_nasabah' => 4
        ]);
    }
}
