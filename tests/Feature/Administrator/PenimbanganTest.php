<?php

namespace Tests\Feature\Administrator;

use Carbon\Carbon;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PenimbanganTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_administrator_can_see_penimbangan_menu()
    {
        $user = User::where('role', 1)->first();

        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->get('/dashboard/penimbangan');
        $response->assertStatus(200);
    }

    public function test_administrator_can_use_penarikan_feature()
    {
        $user = User::where('role', 1)->first();

        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->from('/dashboard/penimbangan/penarikan')->post('/dashboard/penimbangan/penarikan', [
            'id_jenis_sampah' => fake()->numberBetween(1, 5),
            'id_user' => fake()->numberBetween(5, 19),
            'jumlah_kg' => fake()->numberBetween(1, 10),
            'total_harga' => fake()->numberBetween(5000, 20000),
            'created_at' => Carbon::create(2023, 1, 15),
            'updated_at' => Carbon::create(2023, 1, 15)
        ]);

        $response->assertRedirect('/dashboard/penimbangan');
        $response->assertSessionHas('success');
    }

    public function test_administrator_can_use_penyetoran_feature()
    {
        $user = User::where('role', 1)->first();

        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->from('/dashboard/penimbangan/penyetoran')->post('/dashboard/penimbangan/penyetoran', [
            'id_jenis_sampah' => fake()->numberBetween(1, 5),
            'id_user' => fake()->numberBetween(3, 4),
            'jumlah_kg' => fake()->numberBetween(1, 8),
            'total_harga' => fake()->numberBetween(10000, 30000),
            'created_at' => Carbon::create(2023, 1, 15),
            'updated_at' => Carbon::create(2023, 1, 15)
        ]);

        $response->assertRedirect('/dashboard/penimbangan');
        $response->assertSessionHas('success');
    }
}
