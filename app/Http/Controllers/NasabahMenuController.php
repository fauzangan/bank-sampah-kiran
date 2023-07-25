<?php

namespace App\Http\Controllers;

use App\Models\BukuRekening;
use App\Models\Faktur;
use App\Models\Penarikan;
use App\Models\User;
use Illuminate\Http\Request;

class NasabahMenuController extends Controller
{
    public function indexRekening() {
        $buku_rekening = BukuRekening::where('id_nasabah', auth()->user()->id_user)->first();

        return view('dashboard.nasabah-menu.index-rekening',[
            'buku_rekening' => $buku_rekening,
            'transaksis' => $buku_rekening->faktur,
            'jumlah_transaksi' => $buku_rekening->faktur->count()
        ]);
    }

    public function indexPenimbangan() {
        $penarikan = Penarikan::where('id_user', auth()->user()->id_user)->get();
        return view('dashboard.nasabah-menu.index-penimbangan', [
            'penarikans' => $penarikan
        ]); 
    }

    public function requestPenarikanSaldo(Request $request) {
        $user = auth()->user();
        $rekening = BukuRekening::where('id_nasabah', $user->id_user)->first(['id_rekening', 'saldo']);
        
        $validatedData = $request->validate([
            'nominal' => ['required']
        ]);
        $validatedData['id_rekening'] = $rekening->id_rekening;
        $validatedData['jenis_transaksi'] = 0;
        $validatedData['status'] = 0;
        
        NasabahMenuController::penarikanSaldo($rekening, $validatedData['nominal']);
        Faktur::create($validatedData);
        return redirect(route('nasabah.buku-rekening'));
    }

    public function penarikanSaldo($rekening,$saldo) {
        $buku = $rekening;
        $buku['saldo'] -= $saldo;
        
        BukuRekening::where('id_rekening', $buku->id_rekening)->update([
            'saldo' => $buku['saldo']
        ]);
    }
}
