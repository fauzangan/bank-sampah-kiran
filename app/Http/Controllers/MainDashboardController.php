<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\JenisSampah;
use Illuminate\Http\Request;
use App\Charts\PenimbanganJenisSampah;
use App\Charts\PenimbanganJenisSampahChart;
use App\Charts\PenjualanSampahChart;
use App\Models\Penarikan;
use App\Models\Setoran;

class MainDashboardController extends Controller
{
    public function mainDashboard(PenimbanganJenisSampahChart $chartPenimbangan, PenjualanSampahChart $chartPenjualan){
        $data = JenisSampah::all();
        $jumlahKg = JenisSampah::withSum('penarikan as jumlah_kg', 'jumlah_kg')->get();
        
        return view('dashboard.main-dashboard.index', [
            'chartPenimbangan' => $chartPenimbangan->build($data, $jumlahKg),
            'chartPenjualan' => $chartPenjualan->build(),
            'jumlahNasabah' => User::where('role', 3)->count(),
            'jumlahPetugas' => User::where('role', 2)->count(),
            'jumlahAdministrator' => User::where('role', 1)->count(),
            'jumlahPenimbangan' => Penarikan::count() + Setoran::count()
        ]);
    }
}
