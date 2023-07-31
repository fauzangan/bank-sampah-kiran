<?php

namespace App\Http\Controllers;

use App\Models\Setoran;
use Illuminate\Http\Request;

class PenyetoranController extends Controller
{
    public function index() {
        $penyetorans = Setoran::with(['jenisSampah', 'user'])->get();

        return view('dashboard.penyetoran.index', [
            'penyetorans' => $penyetorans,
            'total_penyetoran' => $penyetorans->count(),
            'total_kg' => $penyetorans->sum('jumlah_kg'),
            'avg_kg' => number_format($penyetorans->avg('jumlah_kg'), 2, ","),
            'total_harga' => number_format($penyetorans->sum('total_harga'),2,",","."),
            'avg_harga'=> number_format($penyetorans->avg('total_harga'),2,",",".")
        ]);
    }

    public function inventory() {
        
    }
}
