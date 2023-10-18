<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BukuRekening;
use App\Models\Faktur;
use Illuminate\Database\Seeder;
use \App\Models\JenisSampah;
use App\Models\Loadcell;
use App\Models\Penarikan;
use App\Models\Setoran;
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
            'no_telepon' => '081291289944'
        ]);

        User::create([
            'role' => 1,
            'nama' => 'Mita Ayu Lestari',
            'email' => 'test2@gmail.com',
            'password' => bcrypt('password'),
            'alamat' => '-',
            'no_telepon' => '081291289933'
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

        User::create([
            'role' => 3,
            'nama' => 'Rizki Farhandi',
            'email' => 'nasabah8@gmail.com',
            'password' => bcrypt('password'),
            'alamat' => fake()->address(),
            'no_telepon' => fake()->unique()->phoneNumber(),
        ]);

        User::create([
            'role' => 3,
            'nama' => 'Tanjung',
            'email' => 'nasabah9@gmail.com',
            'password' => bcrypt('password'),
            'alamat' => fake()->address(),
            'no_telepon' => fake()->unique()->phoneNumber(),
        ]);

        User::create([
            'role' => 3,
            'nama' => 'Risa',
            'email' => 'nasabah10@gmail.com',
            'password' => bcrypt('password'),
            'alamat' => fake()->address(),
            'no_telepon' => fake()->unique()->phoneNumber(),
        ]);

        User::create([
            'role' => 3,
            'nama' => 'Muhammad Ilham',
            'email' => 'nasabah11@gmail.com',
            'password' => bcrypt('password'),
            'alamat' => fake()->address(),
            'no_telepon' => fake()->unique()->phoneNumber(),
        ]);

        User::create([
            'role' => 3,
            'nama' => 'Karina',
            'email' => 'nasabah12@gmail.com',
            'password' => bcrypt('password'),
            'alamat' => fake()->address(),
            'no_telepon' => fake()->unique()->phoneNumber(),
        ]);

        User::create([
            'role' => 3,
            'nama' => 'Pudge',
            'email' => 'nasabah13@gmail.com',
            'password' => bcrypt('password'),
            'alamat' => fake()->address(),
            'no_telepon' => fake()->unique()->phoneNumber(),
        ]);

        User::create([
            'role' => 3,
            'nama' => 'Yoko Sudarno',
            'email' => 'nasabah14@gmail.com',
            'password' => bcrypt('password'),
            'alamat' => fake()->address(),
            'no_telepon' => fake()->unique()->phoneNumber(),
        ]);

        User::create([
            'role' => 3,
            'nama' => 'Robert Oppenheimer',
            'email' => 'nasabah15@gmail.com',
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

        JenisSampah::create([
            'nama_sampah' => 'Alumunium',
            'harga_penarikan_kg' => 7000,
            'harga_setoran_kg' => 12000
        ]);

        for($i = 5; $i <= 19; $i++){
            BukuRekening::create([
                'id_nasabah' => $i,
                'saldo' => fake()->numberBetween(5000, 50000)
            ]);
        }

        for($i = 1; $i <= 12; $i++){
            for($j = 1; $j <= 10; $j++){
                Penarikan::create([
                    'id_jenis_sampah' => fake()->numberBetween(1, 5),
                    'id_user' => fake()->numberBetween(5,19),
                    'jumlah_kg' => fake()->numberBetween(1,10),
                    'total_harga' => fake()->numberBetween(5000, 20000),
                    'created_at' => Carbon::create(2023, $i, 15),
                    'updated_at' => Carbon::create(2023, $i, 15)
                ]);
    
                Setoran::create([
                    'id_jenis_sampah' => fake()->numberBetween(1, 5),
                    'id_user' => fake()->numberBetween(3,4),
                    'jumlah_kg' => fake()->numberBetween(1,8),
                    'total_harga' => fake()->numberBetween(10000, 30000),
                    'created_at' => Carbon::create(2023, $i, 15),
                    'updated_at' => Carbon::create(2023, $i, 15)
                ]);
            }
        }

        for($i = 1; $i <= 50; $i++){
            Faktur::create([
                'id_rekening' => fake()->numberBetween(1, 15),
                'nominal' => fake()->numberBetween(15000, 20000),
                'jenis_transaksi' => 1,
                'status' => 1
            ]);

            Faktur::create([
                'id_rekening' => fake()->numberBetween(1, 15),
                'nominal' => fake()->numberBetween(15000, 20000),
                'jenis_transaksi' => 0,
                'status' => fake()->numberBetween(0, 2)
            ]);
        }
    }
}
