<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainDashboardController extends Controller
{
    public function mainDashboard(){
        return view('dashboard.main-dashboard.index');
    }
}
