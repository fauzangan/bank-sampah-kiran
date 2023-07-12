<?php

namespace App\Http\Controllers;

use App\Models\Penarikan;
use Illuminate\Http\Request;

class PenarikanController extends Controller
{
    public function index() {
        return view('dashboard.penarikan.index', [
            'penarikans' => Penarikan::all(),
            'total_penarikan' => Penarikan::count(),
            'total_kg' => Penarikan::sum('jumlah_kg'),
            'avg_kg' => number_format(Penarikan::avg('jumlah_kg'), 2, ","),
            'total_harga' =>  number_format(Penarikan::sum('total_harga'),2,",","."),
            'avg_harga' =>  number_format(Penarikan::avg('total_harga'),2,",",".")
        ]);
    }
}
