<?php

namespace App\Http\Controllers;

use App\Models\JenisSampah;
use App\Models\Penarikan;
use App\Models\User;
use Illuminate\Http\Request;

class PenarikanController extends Controller
{
    public function index() {
        return view('dashboard.penarikan.index', [
            'penarikans' => Penarikan::all()
        ]);
    }
}
