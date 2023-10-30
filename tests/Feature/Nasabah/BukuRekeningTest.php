<?php

namespace Tests\Feature\Nasabah;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BukuRekeningTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_nasabah_can_see_buku_rekening()
    {
        $user = User::where('role', 3)->first();
        
        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->get('/dashboard/nasabah/buku-rekening');
        $response->assertStatus(200);
    }

    public function test_nasabah_can_see_request_penarikan_saldo()
    {
        $user = User::where('role', 3)->first();
        
        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->from('/dashboard/nasabah/buku-rekening')->post('/dashboard/nasabah/buku-rekening', [
            'nominal' => 10000
        ]);

        $response->assertRedirect('/dashboard/nasabah/buku-rekening');
    }
}
