<?php

namespace App\Http\Controllers;

use App\Charts\NasabahPenimbanganJenisSampahChart;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Penarikan;
use App\Models\JenisSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Charts\NasabahPenimbanganSampahChart;
use App\Models\JadwalPenimbangan;

class NasabahDashboardController extends Controller
{
    private $penarikan;
    private $jenisSampah;

    public function __construct()
    {
        $this->penarikan = Penarikan::all();
        $this->jenisSampah = JenisSampah::all();
    }

    public function nasabahDashboard(NasabahPenimbanganSampahChart $chartPenimbangan, NasabahPenimbanganJenisSampahChart $chartJenisSampah)
    {
        $user = auth()->user();
        $jenisSampah = $this->jenisSampah;

        $penimbanganByMonth = NasabahDashboardController::sumPenarikanByMonth($user);
        $rekapan = NasabahDashboardController::penimbanganByJenisSampah($user, $jenisSampah);
        $namaJenisSampah = NasabahDashboardController::labelToArray($jenisSampah);

        $totalHargaPenarikan = $this->penarikan->where('id_user', $user->id_user)->sum('total_harga');

        return view('dashboard.main-dashboard.nasabah', [
            'chartPenimbangan' => $chartPenimbangan->build($penimbanganByMonth),
            'chartJenisSampah' => $chartJenisSampah->build($rekapan, $namaJenisSampah),
            'totalHargaPenarikan' => $totalHargaPenarikan,
            'totalTransaksi' => NasabahDashboardController::totalTransaksi($user),
            'minPenimbangan' => NasabahDashboardController::minPenimbangan($user),
            'maxPenimbangan' => NasabahDashboardController::maxPenimbangan($user),
            'avgPenimbangan' => NasabahDashboardController::avgPenimbangan($user),
            'jadwalPenimbangans' => JadwalPenimbangan::where('status', '=', 0)->get()
        ]);
    }

    public function sumPenarikanByMonth($user)
    {
        $penarikans = $this->penarikan->where('id_user', $user->id_user)->groupBy(function ($date) {
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

    public function penimbanganByJenisSampah($user, $jenisSampah)
    {
        $penarikans = $this->penarikan->where('id_user', $user->id_user)->groupBy('id_jenis_sampah');

        $penarikanmcount = [];
        $penarikanArr = [];

        foreach ($penarikans as $key => $penarikan) {
            $penarikanmcount[(int)$key - 1] = $penarikan->sum('jumlah_kg');
        }

        for ($i = 0; $i < $jenisSampah->count(); $i++) {
            if (!empty($penarikanmcount[$i])) {
                $penarikanArr[$i] = $penarikanmcount[$i];
            } else {
                $penarikanArr[$i] = 0;
            }
        }
        
        return $penarikanArr;
    }

    public function labelToArray($data){
        $dataset = array();
        for($i = 0; $i < $data->count(); $i++){
            $dataset[$i] = $data[$i]->nama_sampah;
        }
        return $dataset;
    }

    public function totalTransaksi($user) {
        return $this->penarikan->where('id_user', $user->id_user)->count();
    }

    public function minPenimbangan($user) {
        return $this->penarikan->where('id_user', $user->id_user)->min('jumlah_kg');
    }

    public function maxPenimbangan($user) {
        return $this->penarikan->where('id_user', $user->id_user)->max('jumlah_kg');
    }

    public function avgPenimbangan($user) {
        return $this->penarikan->where('id_user', $user->id_user)->avg('jumlah_kg');
    }
}
