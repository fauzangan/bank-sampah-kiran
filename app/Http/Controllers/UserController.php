<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\BukuRekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function indexNasabah() {
        return view('dashboard.user.nasabah', [
            'nasabahs' => User::where('role', 3)->get()
        ]);
    }

    public function indexPetugas() {
        return view('dashboard.user.petugas', [
            'petugass' => User::where('role', 2)->get()
        ]);
    }

    public function indexAdministrator() {
        return view('dashboard.user.administrator', [
            'administrators' => User::where('role', 1)->get()
        ]);
    }

    public function detailUser() {
        $user = auth()->user();
        $user['tanggal_mendaftar'] = Carbon::parse($user->created_at)->locale('id');
        $user['tanggal_mendaftar']->settings(['formatFunction' => 'translatedFormat']);
        $user['tanggal_mendaftar'] = $user['tanggal_mendaftar']->format('l, j F Y ; h:i a');

        return view('dashboard.user.user-detail', [
            'user' => $user
        ]);
    }

    public function updateUser(Request $request) {
        $validatedData = $request->validate([
            'no_telepon' => ['required'],
            'alamat' => ['required']
        ]);

        User::where('id_user', auth()->user()->id_user)->update($validatedData);
        return redirect(route('user.detail-user'));
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
        BukuRekening::create([
            'id_nasabah' => $user->id_user
        ]);

        return redirect(route('login'));
    }

    public function updateStatus(Request $request, User $user) {
        $validatedData = $request->validate([
            'isActive' => ['required']
        ]);

        User::where('id_user', $user->id_user)->update($validatedData);
        return redirect(route('user.nasabah.index'));
    }
}
