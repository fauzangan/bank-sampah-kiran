<?php

namespace App\Http\Controllers;

use App\Models\JenisSampah;
use Illuminate\Http\Request;

class InvetoriSampahController extends Controller
{    
    public function index() {
        $res = JenisSampah::withSum('penarikan as jumlah_kg', 'jumlah_kg')->get();
        $sub = JenisSampah::withSum('setoran as jumlah_kg', 'jumlah_kg')->get();

        return view('dashboard.inventori.index', [
            'jenis_sampahs' => InvetoriSampahController::sumSampah($res, $sub)
        ]);
    }

    public function sumSampah($result, $subtraction) {
        for($i = 0; $i < $result->count(); $i++){
            $result[$i]->jumlah_kg -= $subtraction[$i]->jumlah_kg;
            if($result[$i]->jumlah_kg < 0){
                $result[$i]->jumlah_kg = 0;
            }
        }
        return $result;
    }
}
