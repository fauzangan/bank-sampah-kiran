<?php

namespace App\Http\Controllers;

use App\Charts\PetugasPenimbanganJenisSampahChart;
use Carbon\Carbon;
use App\Models\Setoran;
use Illuminate\Http\Request;
use App\Models\JadwalPenimbangan;
use App\Charts\PetugasPenimbanganSampahChart;
use App\Http\Middleware\Petugas;
use App\Models\JenisSampah;

class PetugasDashboardController extends Controller
{
    private $penyetorans;
    private $jenisSampah;

    public function __construct()
    {
        $this->penyetorans = Setoran::all();
        $this->jenisSampah = JenisSampah::all();
    }

    public function petugasDashboard(PetugasPenimbanganSampahChart $chartPenimbangan, PetugasPenimbanganJenisSampahChart $chartJenisSampah) {
        $user = auth()->user();
        $jenisSampah = $this->jenisSampah;

        $penimbanganByMonth = PetugasDashboardController::sumPenarikanByMonth($user);
        $rekapanJenisSampah = PetugasDashboardController::penimbanganByJenisSampah($user, $jenisSampah);
        $namaJenisSampah = PetugasDashboardController::labelToArray($jenisSampah);
        $totalKgPenyetoran = $this->penyetorans->where('id_user', $user->id_user)->sum('jumlah_kg');
        
        return view('dashboard.main-dashboard.petugas', [
            'jadwalPenimbangans' => JadwalPenimbangan::where('status', '=', 0)->get(),
            'chartPenimbangan' => $chartPenimbangan->build($penimbanganByMonth),
            'chartJenisSampah' => $chartJenisSampah->build($rekapanJenisSampah, $namaJenisSampah),
            'totalKgPenyetoran' => $totalKgPenyetoran,
            'totalTransaksi' => PetugasDashboardController::totalTransaksi($user),
            'minPenimbangan' => number_format(PetugasDashboardController::minPenimbangan($user), 2, ','),
            'maxPenimbangan' => number_format(PetugasDashboardController::maxPenimbangan($user), 2, ','),
            'avgPenimbangan' => number_format(PetugasDashboardController::avgPenimbangan($user), 2, ',')
        ]);
    }

    public function sumPenarikanByMonth($user)
    {
        $penyetorans = $this->penyetorans->where('id_user', $user->id_user)->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('m');
        });

        $penarikanmcount = [];
        $penarikanArr = [];

        foreach ($penyetorans as $key => $penarikan) {
            $penarikanmcount[(int)$key - 1] = $penarikan->sum('jumlah_kg');
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
        $penyetorans = $this->penyetorans->where('id_user', $user->id_user)->groupBy('id_jenis_sampah');

        $penyetoranmcount = [];
        $penyetoranArr = [];

        foreach ($penyetorans as $key => $penyetoran) {
            $penyetoranmcount[(int)$key - 1] = $penyetoran->sum('jumlah_kg');
        }

        for ($i = 0; $i < $jenisSampah->count(); $i++) {
            if (!empty($penyetoranmcount[$i])) {
                $penyetoranArr[$i] = $penyetoranmcount[$i];
            } else {
                $penyetoranArr[$i] = 0;
            }
        }
        return $penyetoranArr;
    }

    public function labelToArray($data){
        $dataset = array();
        for($i = 0; $i < $data->count(); $i++){
            $dataset[$i] = $data[$i]->nama_sampah;
        }
        return $dataset;
    }

    public function totalTransaksi($user)
    {
        return $this->penyetorans->where('id_user', $user->id_user)->count();
    }

    public function minPenimbangan($user)
    {
        return $this->penyetorans->where('id_user', $user->id_user)->min('jumlah_kg');
    }

    public function maxPenimbangan($user)
    {
        return $this->penyetorans->where('id_user', $user->id_user)->max('jumlah_kg');
    }

    public function avgPenimbangan($user)
    {
        return $this->penyetorans->where('id_user', $user->id_user)->avg('jumlah_kg');
    }
}
