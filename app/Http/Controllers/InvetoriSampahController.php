<?php

namespace App\Http\Controllers;

use App\Models\JenisSampah;
use Illuminate\Http\Request;

class InvetoriSampahController extends Controller
{    
    public function index() {
        $res = JenisSampah::withSum('penarikan as jumlah_kg', 'jumlah_kg')->get();
        $sub = JenisSampah::withSum('setoran as jumlah_kg', 'jumlah_kg')->get();
        $result = InvetoriSampahController::totalBeratSampah($res, $sub);
        $result = InvetoriSampahController::totalHargaSampah($result);

        return view('dashboard.inventori.index', [
            'jenis_sampahs' => $result,
            'total_berat' => number_format($result->sum('jumlah_kg'),2,",","."),
            'total_nilai' => number_format($result->sum('nilai_sampah'),2,",",".") 
        ]);
    }

    public function totalBeratSampah($result, $subtraction) {
        for($i = 0; $i < $result->count(); $i++){
            $result[$i]->jumlah_kg -= $subtraction[$i]->jumlah_kg;
            if($result[$i]->jumlah_kg < 0){
                $result[$i]->jumlah_kg = 0;
            }
        }
        return $result;
    }

    public function totalHargaSampah($result) {
        foreach($result as $res){
            $res['nilai_sampah'] = $res['harga_setoran_kg'] * $res['jumlah_kg'];
        }
        return $result;
    }
}
