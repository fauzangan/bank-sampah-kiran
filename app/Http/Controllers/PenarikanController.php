<?php

namespace App\Http\Controllers;

use App\Models\Penarikan;
use Illuminate\Http\Request;

class PenarikanController extends Controller
{
    public function index() {
        $penarikans = Penarikan::with(['jenisSampah', 'user'])->get();

        return view('dashboard.penarikan.index', [
            'penarikans' => $penarikans,
            'total_penarikan' => $penarikans->count(),
            'total_kg' => $penarikans->sum('jumlah_kg'),
            'avg_kg' => number_format($penarikans->avg('jumlah_kg'), 2, ","),
            'total_harga' =>  number_format($penarikans->sum('total_harga'),2,",","."),
            'avg_harga' =>  number_format($penarikans->avg('total_harga'),2,",",".")
        ]);
    }
}
