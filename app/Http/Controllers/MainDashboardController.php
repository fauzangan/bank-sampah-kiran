<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Setoran;
use App\Models\Penarikan;
use App\Models\JenisSampah;
use Illuminate\Http\Request;
use App\Charts\PenjualanSampahChart;
use App\Charts\PenimbanganJenisSampah;
use App\Charts\PenimbanganJenisSampahChart;
use App\Models\BukuRekening;

class MainDashboardController extends Controller
{
    public $keuntungan;
    public $saldo;

    public function mainDashboard(PenimbanganJenisSampahChart $chartPenimbangan, PenjualanSampahChart $chartPenjualan)
    {
        $data = JenisSampah::all();
        $jumlahKg = JenisSampah::withSum('penarikan as jumlah_kg', 'jumlah_kg')->get();
        $pembelian = MainDashboardController::sumPenarikanByMonth();
        $penjualan = MainDashboardController::sumPenyetoranByMonth();

        return view('dashboard.main-dashboard.index', [
            'chartPenimbangan' => $chartPenimbangan->build($data, $jumlahKg),
            'chartPenjualan' => $chartPenjualan->build($pembelian, $penjualan),
            'jumlahNasabah' => User::where('role', 3)->count(),
            'jumlahPetugas' => User::where('role', 2)->count(),
            'jumlahAdministrator' => User::where('role', 1)->count(),
            'jumlahPenimbangan' => Penarikan::count() + Setoran::count(),
            'reportKeuntungan' => MainDashboardController::sumReportKeuntungan(),
            'reportSaldo' => MainDashboardController::sumReportSaldo()
        ]);
    }

    public function sumPenarikanByMonth()
    {
        $penarikans = Penarikan::select('id_penarikan', 'jumlah_kg', 'total_harga', 'created_at')->get()->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('m');
        });

        $penarikanmcount = [];
        $penarikanArr = [];

        foreach ($penarikans as $key => $penarikan) {
            $penarikanmcount[(int)$key - 1] = $penarikan->sum('total_harga');
        }

        for ($i = 0; $i < 12; $i++) {
            if (!empty($penarikanmcount[$i])) {
                $penarikanArr[$i] = $penarikanmcount[$i];
            } else {
                $penarikanArr[$i] = 0;
            }
        }
        return $penarikanArr;
    }

    public function sumPenyetoranByMonth()
    {
        $penyetorans = Setoran::select('id_setoran', 'jumlah_kg', 'total_harga', 'created_at')->get()->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('m');
        });

        $penyetoranmcount = [];
        $penyetoranArr = [];

        foreach ($penyetorans as $key => $penyetoran) {
            $penyetoranmcount[(int)$key - 1] = $penyetoran->sum('total_harga');
        }

        for ($i = 0; $i < 12; $i++) {
            if (!empty($penyetoranmcount[$i])) {
                $penyetoranArr[$i] = $penyetoranmcount[$i];
            } else {
                $penyetoranArr[$i] = 0;
            }
        }
        return $penyetoranArr;
    }

    public function sumReportKeuntungan()
    {
        $penarikan = Penarikan::sum('total_harga');
        $penyetoran = Setoran::sum('total_harga');

        return $penyetoran-$penarikan;
    }

    public function sumReportSaldo()
    {
        $keuntungan = MainDashboardController::sumReportKeuntungan();
        $saldo = BukuRekening::sum('saldo');

        return $saldo + $keuntungan;
    }
}
