<?php

namespace Tests\Feature\Administrator;

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
    public function test_administrator_can_see_buku_rekening_nasabah()
    {
        $user = User::where('role', 1)->first();

        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->get('/dashboard/buku-rekening');
        $response->assertStatus(200);
    }

    public function test_administrator_can_see_detail_buku_rekening_nasabah()
    {
        $user = User::where('role', 1)->first();

        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->get('/dashboard/buku-rekening/1');
        $response->assertStatus(200);
    }
}
