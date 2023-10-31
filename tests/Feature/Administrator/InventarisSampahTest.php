<?php

namespace Tests\Feature\Administrator;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InventarisSampahTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_administrator_can_see_inventaris_sampah()
    {
        $user = User::where('role', 1)->first();

        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
        
        $response = $this->get('/dashboard/inventori');
        $response->assertStatus(200);
    }
}
