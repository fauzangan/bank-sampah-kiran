<?php

namespace App\Http\Controllers;

use App\Models\BukuRekening;
use App\Models\Penarikan;
use Illuminate\Http\Request;

class BukuRekeningController extends Controller
{
    public function index() {
        $data = BukuRekeningController::totalTransaksiUser(BukuRekening::all());

        return view('dashboard.buku-rekening.index', [
            'buku_rekenings' => $data
        ]);
    }

    public function totalTransaksiUser($object) {
        foreach($object as $data){
            $data['total_transaksi_user'] = Penarikan::where('id_user', $data['id_nasabah'])->count();
        }
        return $object;
    }

    public function detailFaktur(BukuRekening $bukurekening) {
        return view('dashboard.buku-rekening.detail', [
            'fakturs' => $bukurekening->faktur,
            'nama' => $bukurekening->nasabah->nama,
            'saldo' => $bukurekening->saldo
        ]);
    }

}
