<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_see_register_page()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    public function test_user_can_register_new_account()
    {
        $response = $this->from('/register')->post('/register', [
            'nama' => 'Rizky Kurniawan',
            'email' => fake()->email(),
            'password' => 'password',
            'password_confirmation' => 'password',
            'alamat' => '-',
            'no_telepon' => fake()->e164PhoneNumber()
        ]);

        $response->assertRedirect('/login');
    }

    public function test_user_cannot_register_with_incorrect_format()
    {
        $response = $this->from('/register')->post('/register', [
            'nama' => 'Rizky Kurniawan',
            'email' => fake()->email(),
            'password' => 'password',
            'password_confirmation' => 'password',
            'alamat' => '-',
            'no_telepon' => 'helloworld'
        ]);

        $response->assertSessionHasErrors();
        $response->assertRedirect('/register');
    }

    public function test_user_cannot_register_with_duplicate_data()
    {
        $response = $this->from('/register')->post('/register', [
            'nama' => 'Rizky Kurniawan',
            'email' => 'test1@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'alamat' => '-',
            'no_telepon' => 'helloworld'
        ]);

        $response->assertSessionHasErrors();
        $response->assertRedirect('/register');
    }
}
