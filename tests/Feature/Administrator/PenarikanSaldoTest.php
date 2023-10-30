<?php

namespace Tests\Feature\Administrator;

use App\Models\Faktur;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PenarikanSaldoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_administrator_can_see_penarikan_saldo_feature()
    {
        $user = User::where('role', 1)->first();

        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->get('/dashboard/penarikan-saldo');
        $response->assertStatus(200);
    }

    public function test_administrator_accept_request_penarikan_saldo_feature()
    {
        $user = User::where('role', 1)->first();

        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $faktur = Faktur::create([
            'id_rekening' => fake()->numberBetween(1, 15),
            'nominal' => fake()->numberBetween(15000, 20000),
            'jenis_transaksi' => 0,
            'status' => 0
        ]);

        $response = $this->from('/dashboard/penarikan-saldo')->put('/dashboard/penarikan-saldo/'.$faktur->id_faktur.'/status', [
            'status' => 1,
        ]);

        $response->assertRedirect('/dashboard/penarikan-saldo');
    }

    public function test_administrator_denied_request_penarikan_saldo_feature()
    {
        $user = User::where('role', 1)->first();

        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $faktur = Faktur::create([
            'id_rekening' => fake()->numberBetween(1, 15),
            'nominal' => fake()->numberBetween(15000, 20000),
            'jenis_transaksi' => 0,
            'status' => 0
        ]);

        $response = $this->from('/dashboard/penarikan-saldo')->put('/dashboard/penarikan-saldo/'.$faktur->id_faktur.'/status', [
            'status' => 2,
        ]);

        $response->assertRedirect('/dashboard/penarikan-saldo');
    }
}
