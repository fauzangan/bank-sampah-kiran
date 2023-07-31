<?php

namespace App\Http\Controllers;

use App\Models\BukuRekening;
use App\Models\Faktur;
use App\Models\Penarikan;
use Illuminate\Http\Request;

class BukuRekeningController extends Controller
{
    private $bukurekening;
    private $fakturs;

    public function __construct()
    {
        $this->bukurekening = BukuRekening::with(['faktur', 'nasabah'])->get();
        $this->fakturs = Faktur::with(['bukuRekening.nasabah'])->get();
    }

    public function index() {
        $data = BukuRekeningController::totalTransaksiUser($this->bukurekening);

        return view('dashboard.buku-rekening.index', [
            'buku_rekenings' => $data
        ]);
    }

    public function totalTransaksiUser($object) {
        foreach($object as $data){
            $data['total_transaksi_user'] = $this->fakturs->where('id_rekening', $data['id_rekening'])->count();
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

    public function indexFaktur() {
        $transaksiSuccess = $this->fakturs->where('status','!=', 0);
        $transaksiPending = $this->fakturs->where('status', 0);

        return view('dashboard.buku-rekening.penarikan-saldo', [
            'transaksiSuccess' => $transaksiSuccess,
            'transaksiPending' => $transaksiPending
        ]);
    }

    public function updateStatusFaktur(Request $request, Faktur $faktur) {
        if($request->status != 1){
            Faktur::where('id_faktur', $faktur->id_faktur)->update([
                'status' => $request->status
            ]);
            BukuRekeningController::updateSaldo($faktur->bukuRekening->id_rekening, $faktur->nominal);
        }else{
            Faktur::where('id_faktur', $faktur->id_faktur)->update([
                'status' => $request->status
            ]);
        }

        return redirect(route('buku-rekening.faktur.index'));
    }

    public function updateSaldo($id,$saldo) {
        $buku = BukuRekening::where('id_rekening', $id)->first(['saldo']);
        $buku['saldo'] += $saldo;

        BukuRekening::where('id_rekening', $id)->update([
            'saldo' => $buku['saldo']
        ]);
    }

}
