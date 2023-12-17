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

        $response = $this->actingAs($user)->get('/dashboard/buku-rekening');
        $response->assertOk();
    }

    public function test_administrator_can_see_detail_buku_rekening_nasabah()
    {
        $user = User::where('role', 1)->first();

        $response = $this->actingAs($user)->get('/dashboard/buku-rekening/1');
        $response->assertStatus(200);
    }
}
