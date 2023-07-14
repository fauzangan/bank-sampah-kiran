<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function indexNasabah() {
        return view('dashboard.user.nasabah', [
            'nasabahs' => User::where('role', 3)->get()
        ]);
    }

    public function createNasabah() {
        return view('authentication.register.register');
    }

    public function storeNasabah(Request $request) {
        $validatedData = $request->validate([
            'nama' => ['required', 'min:3', 'max:50'],
            'email' => ['required', 'email'],
            'alamat' => ['required'],
            'no_telepon' => ['required'],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['role'] = 3;
        $user = User::create($validatedData);
        dd($user->id_user);
        
    }
}
