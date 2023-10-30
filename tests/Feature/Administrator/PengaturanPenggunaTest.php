<?php

namespace Tests\Feature\Administrator;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PengaturanPenggunaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_administrator_can_see_nasabah_table()
    {
        $user = User::where('role', 1)->first();

        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->get('/dashboard/pengguna/nasabah');
        $response->assertStatus(200);
    }

    public function test_administrator_can_see_petugas_table()
    {
        $user = User::where('role', 1)->first();

        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->get('/dashboard/pengguna/petugas');
        $response->assertStatus(200);
    }

    public function test_administrator_can_see_administrator_table()
    {
        $user = User::where('role', 1)->first();

        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->get('/dashboard/pengguna/administrator');
        $response->assertStatus(200);
    }
}
