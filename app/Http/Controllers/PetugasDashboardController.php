<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetugasDashboardController extends Controller
{
    public function petugasDashboard() {
        return view('dashboard.main-dashboard.petugas');
    }
}
