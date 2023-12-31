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
use App\Charts\StatusTransaksiNasabahChart;
use App\Models\BukuRekening;
use App\Models\Faktur;

class AdminDashboardController extends Controller
{
    private $penarikan;
    private $penyetoran;

    public function __construct()
    {
        $this->penarikan = Penarikan::all();
        $this->penyetoran = Setoran::all();
    }

    public function adminDashboard(PenimbanganJenisSampahChart $chartPenimbangan, PenjualanSampahChart $chartPenjualan, StatusTransaksiNasabahChart $chartTransaksiNasabah)
    {
        $jenisSampah = JenisSampah::all();
        $fakturs = Faktur::all();
        $users = User::all();
        $jumlahKg = JenisSampah::withSum('penarikan as jumlah_kg', 'jumlah_kg')->get();
        $pembelian = AdminDashboardController::sumPenarikanByMonth();
        $penjualan = AdminDashboardController::sumPenyetoranByMonth();
        $statusSelesai = $fakturs->where('status', 1)->count();
        $statusPending = $fakturs->where('status', 0)->count();
        $statusDitolak = $fakturs->where('status', 2)->count();


        return view('dashboard.main-dashboard.administrator', [
            'chartPenimbangan' => $chartPenimbangan->build($jenisSampah, $jumlahKg),
            'chartPenjualan' => $chartPenjualan->build($pembelian, $penjualan),
            'chartTransaksiNasabah' => $chartTransaksiNasabah->build($statusSelesai, $statusPending, $statusDitolak),
            'jumlahNasabah' => $users->where('role', 3)->count(),
            'jumlahPetugas' => $users->where('role', 2)->count(),
            'jumlahAdministrator' => $users->where('role', 1)->count(),
            'jumlahPenimbangan' => $this->penarikan->count() + $this->penyetoran->count(),
            'totalSampah' => $this->penarikan->sum('jumlah_kg'),
            'reportKeuntungan' => AdminDashboardController::sumReportKeuntungan(),
            'reportSaldo' => AdminDashboardController::sumReportSaldo()
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
        $penarikan = $this->penarikan->sum('total_harga');
        $penyetoran = $this->penyetoran->sum('total_harga');

        if($penyetoran-$penarikan <= 0){
            return 0;
        }else{
            return $penyetoran - $penarikan;
        }
    }

    public function sumReportSaldo()
    {
        // $keuntungan = AdminDashboardController::sumReportKeuntungan();
        $saldo = BukuRekening::sum('saldo');

        return $saldo;
    }
}
