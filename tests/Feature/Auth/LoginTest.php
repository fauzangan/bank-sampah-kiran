<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_see_login_page()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_administrator_can_login_with_correct_credentials()
    {
        $user = User::where('role', 1)->first();
        
        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertRedirect('/dashboard/admin');
    }

    public function test_petugas_can_login_with_correct_credentials()
    {
        $user = User::where('role', 2)->first();
        
        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertRedirect('/dashboard/petugas');
    }

    public function test_nasabah_can_login_with_correct_credentials()
    {
        $user = User::where('role', 3)->first();
        
        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertRedirect('/dashboard/nasabah');
    }

    public function test_user_cannot_view_a_login_form_when_authenticated()
    {
        $user = User::where('role', 3)->first();
        
        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect('/dashboard/nasabah');
    }

    public function test_user_cannot_login_with_incorrect_credentials()
    {
        $response = $this->from('/login')->post('/login', [
            'email' => 'null@gmail.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/login');
    }

}
