<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NasabahDashboardController extends Controller
{
    public function nasabahDashboard() {
        return view('dashboard.main-dashboard.nasabah');
    }
}
