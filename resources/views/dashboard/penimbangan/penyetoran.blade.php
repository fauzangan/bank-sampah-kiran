@extends('dashboard.layouts.main')
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Penyetoran</h4>
        <p class="card-description">
            Penyetoran berdasarkan jenis sampah
        </p>
        <form action="{{ route('penimbangan.penyetoran.store') }}" method="POST" class="forms-sample">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="justify-content-center">
                        <div class="card border-primary rounded-3 mb-3">
                            <h5 class="card-header" style="background-color: #4da6ff; color:white">Berat Sampah</h5>
                            <div class="card-body">
                                <h5 style="font-size: 70px; font-weight: bold"><span id="berat">10</span> <span
                                        style="font-size: 36px; vertical-align: top">Kg</span></h5>
                                <input type="hidden" name="jumlah_kg" id="jumlah_kg" value="10">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="justify-content-center">
                        <div class="card border-primary rounded-3 mb-3">
                            <h5 class="card-header" style="background-color: #ff3333; color:white">Harga Sampah</h5>
                            <div class="card-body">
                                <h5 style="font-size: 70px; font-weight: bold"><span id="harga">0</span></h5>
                                <input type="hidden" name="total_harga" id="total_harga" value="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="select-jenis-sampah">Jenis Sampah</label>
                <div class="row">
                    <div class="col">
                        <select id="select-jenis-sampah" class="form-select form-select-sm"
                            placeholder="Pilih Jenis Sampah..." name="id_jenis_sampah">
                            @foreach ($jenis_sampahs as $jenis_sampah)
                            <option value="{{ $jenis_sampah->id_jenis_sampah }}" data-harga={{ $jenis_sampah->
                                harga_penarikan_kg }}>{{ $jenis_sampah->nama_sampah }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-auto">
                        <button class="btn btn-success" type="button" onclick="test()">Detail</button>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <label for="">Petugas Yayasan</label>
                <div class="row">
                    <div class="col">
                        <select id="select-user" class="form-select form-select-sm" placeholder="Pilih Nasabah..."
                            name="id_user">
                            @foreach ($users as $user)
                            <option value="{{ $user->id_user }}">{{ $user->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-auto">
                        <button class="btn btn-success" type="button" onclick="detail()">Detail</button>
                    </div>
                </div>

            </div>
            <button type="submit" class="btn btn-primary btn-lg" style="color: white">Submit</button>
        </form>
    </div>
</div>
@endsection
<script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('js/penyetoran.js') }}"></script>