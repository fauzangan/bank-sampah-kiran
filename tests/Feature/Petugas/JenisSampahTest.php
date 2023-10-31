<?php

namespace Tests\Feature\Petugas;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JenisSampahTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_petugas_can_see_jenis_sampah()
    {
        $user = User::where('role', 2)->first();
        
        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->get('/dashboard/petugas/jenis-sampah');
        $response->assertStatus(200);
    }
}
