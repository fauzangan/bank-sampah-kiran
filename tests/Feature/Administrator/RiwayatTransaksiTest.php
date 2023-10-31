<?php

namespace Tests\Feature\Administrator;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RiwayatTransaksiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_administrator_can_see_riwayat_penyetoran()
    {
        $user = User::where('role', 1)->first();

        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
        
        $response = $this->get('/dashboard/histori/penyetoran');
        $response->assertStatus(200);
    }

    public function test_administrator_can_see_riwayat_penarikan()
    {
        $user = User::where('role', 1)->first();

        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
        
        $response = $this->get('/dashboard/histori/penarikan');
        $response->assertStatus(200);
    }
}
