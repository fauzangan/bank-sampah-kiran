<?php

namespace Tests\Feature\Nasabah;

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
    public function test_nasabah_can_see_jenis_sampah_data()
    {
        $user = User::where('role', 3)->first();
        
        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->get('/dashboard/nasabah/jenis-sampah');
        $response->assertStatus(200);
    }
}
