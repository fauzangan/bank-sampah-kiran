<?php

namespace Tests\Feature\Administrator;

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
    public function test_administrator_can_see_jenis_sampah_data()
    {
        $user = User::where('role', 1)->first();
        
        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->get('/dashboard/jenis-sampah');
        $response->assertStatus(200);
    }

    // public function test_administrator_can_add_jenis_sampah_data()
    // {
    //     $user = User::where('role', 1)->first();
        
    //     $response = $this->from('/login')->post('/login', [
    //         'email' => $user->email,
    //         'password' => 'password',
    //     ]);

    //     $response = $this->from('/dashboard/jenis-sampah/create')->post('/dashboard/jenis-sampah', [
    //         'nama_sampah' => 'Adien',
    //         'harga_penarikan_kg' => 3000,
    //         'harga_setoran_kg' => 2850,
    //     ]);

    //     $response->assertRedirect('/dashboard/jenis-sampah');
    //     $response->assertSessionHas('success');

    // }

    public function test_administrator_can_edit_jenis_sampah_data()
    {
        $user = User::where('role', 1)->first();
        
        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->from('/dashboard/jenis-sampah/1/edit')->put('/dashboard/jenis-sampah/1', [
            'nama_sampah' => 'Test',
            'harga_penarikan_kg' => 3000,
            'harga_setoran_kg' => 2850,
        ]);

        $response->assertRedirect('/dashboard/jenis-sampah');
        $response->assertSessionHas('success');

    }
}
