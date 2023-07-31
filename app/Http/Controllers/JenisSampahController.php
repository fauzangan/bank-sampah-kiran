<?php

namespace App\Http\Controllers;

use App\Models\JenisSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class JenisSampahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.jenis-sampah.index', [
            'jenis' => JenisSampah::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.jenis-sampah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_sampah' => ['required', 'max:255'],
            'harga_penarikan_kg' => ['required', 'numeric'],
            'harga_setoran_kg' => ['required', 'numeric']
        ]);

        JenisSampah::create($validatedData);
        return redirect(route('jenis-sampah.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd(JenisSampah::where('id_jenis_sampah', $id)->get());
        return view('dashboard.jenis-sampah.edit', [
            'jenis_sampah' => JenisSampah::where('id_jenis_sampah', $id)->first() 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_sampah' => ['required', 'max:255'],
            'harga_penarikan_kg' => ['required'],
            'harga_setoran_kg' => ['required']
        ]);

        JenisSampah::where('id_jenis_sampah', $id)->update($validatedData);
        return redirect(route('jenis-sampah.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
