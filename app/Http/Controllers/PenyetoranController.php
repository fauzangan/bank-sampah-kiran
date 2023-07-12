<?php

namespace App\Http\Controllers;

use App\Models\Setoran;
use Illuminate\Http\Request;

class PenyetoranController extends Controller
{
    public function index() {
        return view('dashboard.penyetoran.index', [
            'penyetorans' => Setoran::all(),
            'total_penyetoran' => Setoran::count(),
            'total_kg' => Setoran::sum('jumlah_kg'),
            'avg_kg' => number_format(Setoran::avg('jumlah_kg'), 2, ","),
            'total_harga' => number_format(Setoran::sum('total_harga'),2,",","."),
            'avg_harga'=> number_format(Setoran::avg('total_harga'),2,",",".")
        ]);
    }
}
