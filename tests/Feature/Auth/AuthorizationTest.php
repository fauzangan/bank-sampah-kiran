<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_with_administrator_role_cannot_access_another_roles()
    {
        $user = User::where('role', 1)->first();
        
        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->actingAs($user)->get('/dashboard/petugas');
        $response->assertStatus(403);
    }

    public function test_user_with_petugas_role_cannot_access_another_roles()
    {
        $user = User::where('role', 2)->first();
        
        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->actingAs($user)->get('/dashboard/admin');
        $response->assertStatus(403);
    }

    public function test_user_with_nasabah_role_cannot_access_another_roles()
    {
        $user = User::where('role', 3)->first();
        
        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->actingAs($user)->get('/dashboard/petugas');
        $response->assertStatus(403);
    }
}
