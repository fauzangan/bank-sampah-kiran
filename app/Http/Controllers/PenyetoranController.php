<?php

namespace App\Http\Controllers;

use App\Models\Setoran;
use Illuminate\Http\Request;

class PenyetoranController extends Controller
{
    public function index() {
        return view('dashboard.penyetoran.index', [
            'penyetorans' => Setoran::all() 
        ]);
    }
}
