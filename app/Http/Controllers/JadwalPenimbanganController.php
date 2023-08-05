<?php

namespace App\Http\Controllers;

use App\Models\JadwalPenimbangan;
use Illuminate\Http\Request;

class JadwalPenimbanganController extends Controller
{
    public function storeJadwalPenimbangan(Request $request) {
        $validatedData = $request->validate([
            'tanggal' => ['required', 'date'],
            'jam' => ['required']
        ]);

        JadwalPenimbangan::create($validatedData);
        return redirect(route('penimbangan'))->with('success', 'Jadwal Penimbangan Berhasil Dibuat!');
    }

    public function updateStatusJadwal(Request $request, $id) {
        $validatedData = $request->validate([
            'status' => ['required']
        ]);

        JadwalPenimbangan::where('id_jadwal_penimbangan', $id)->update($validatedData);
        return redirect(route('penimbangan'))->with('success', 'Status Jadwal Berhasil Diubah!');
    }

    public function editJadwalPenimbangan($id) {
        $jadwalPenimbangan = JadwalPenimbangan::find($id);
        return response()->json($jadwalPenimbangan);
    }

    public function updateJadwalPenimbangan(Request $request) {
        $validatedData = $request->validate([
            'id_jadwal_penimbangan' => ['required'],
            'tanggal' => ['required', 'date'],
            'jam' => ['required']
        ]);

        JadwalPenimbangan::where('id_jadwal_penimbangan', $request->id_jadwal_penimbangan)->update($validatedData);
        return redirect(route('penimbangan'))->with('success', 'Jadwal Penimbangan Berhasil Diubah!');
    }
}
