<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenimbanganController extends Controller
{
    public function index() {
        return view('dashboard.penimbangan.index');
    }

    public function penarikan() {
        return view('dashboard.penimbangan.penarikan');
    }

    public function storePenarikan() {
        
    }
}
