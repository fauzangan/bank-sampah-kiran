<?php

namespace App\Http\Controllers;

use App\Models\JenisSampah;
use App\Models\Setoran;
use Illuminate\Http\Request;

class PetugasMenuController extends Controller
{
    public function indexPenimbangan() {
        return view('dashboard.petugas-menu.index-penimbangan', [
            'penyetorans' => Setoran::where('id_user', auth()->user()->id_user)->get()
        ]);
    }

    public function indexJenisSampah() {
        return view('dashboard.petugas-menu.index-jenis-sampah', [
            'jenisSampah' => JenisSampah::all()
        ]);
    }
}
