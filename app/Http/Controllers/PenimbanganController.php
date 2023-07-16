<?php

namespace App\Http\Controllers;

use App\Models\BukuRekening;
use App\Models\JenisSampah;
use App\Models\Penarikan;
use App\Models\Setoran;
use App\Models\User;
use Illuminate\Http\Request;

class PenimbanganController extends Controller
{
    public function index() {
        return view('dashboard.penimbangan.index');
    }

    public function penarikan() {
        return view('dashboard.penimbangan.penarikan', [
            'jenis_sampahs' => JenisSampah::all(),
            'users' => User::where('role', 3)->get()
        ]);
    }

    public function storePenarikan(Request $request) {
        $validatedData = $request->validate([
            'jumlah_kg' => ['required'],
            'total_harga' => ['required'],
            'id_user' => ['required'],
            'id_jenis_sampah' => ['required']
        ]);
        Penarikan::create($validatedData);
        PenimbanganController::updateSaldo($request->id_user, $request->total_harga);
        return redirect('/dashboard/penimbangan');
    }

    public function penyetoran() {
        return view('dashboard.penimbangan.penyetoran', [
            'jenis_sampahs' => JenisSampah::all(),
            'users' => User::where('role', 2)->get()
        ]);
    }

    public function storePenyetoran(Request $request) {
        $validatedData = $request->validate([
            'jumlah_kg' => ['required'],
            'total_harga' => ['required'],
            'id_user' => ['required'],
            'id_jenis_sampah' => ['required']
        ]);

        Setoran::create($validatedData);
        return redirect('/dashboard/penimbangan');
    }

    public function updateSaldo($id,$saldo) {
        $buku = BukuRekening::where('id_nasabah', $id)->first(['saldo']);
        $buku['saldo'] += $saldo;

        BukuRekening::where('id_nasabah', $id)->update([
            'saldo' => $buku['saldo']
        ]);
    }
}
