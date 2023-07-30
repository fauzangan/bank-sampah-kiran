@extends('dashboard.layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card text-center">
            <div class="card-header">
                Penarikan Sampah
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-center mb-3">
                    <i class="icon-lg mdi mdi-bank-transfer-in"></i>
                </div>
                <p>Penarikan sampah berdasarkan jenis sampah yang tersedia yang dilakukan oleh Petugas bank sampah
                    terhadap Nasabah</p>
                <a class="btn btn-success mt-3 btn-lg" href="{{ route('penimbangan.penarikan') }}"
                    style="color: white">Lakukan Penarikan</a>
            </div>
        </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card text-center">
            <div class="card-header">
                Penyetoran Sampah
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-center mb-3">
                    <i class="icon-lg mdi mdi-bank-transfer-out"></i>
                </div>
                <p>Penyetoran sampah berdasarkan jenis sampah yang tersedia yang dilakukan oleh Petugas Yayasan bank
                    sampah terhadap bank sampah</p>
                <a class="btn btn-success mt-3 btn-lg" href="{{ route('penimbangan.penyetoran') }}"
                    style="color: white">Lakukan Penyetoran</a>
            </div>
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Buat Jadwal Penimbangan</h4>
                <form action="">
                    <div class="row form-group">
                        <div class="col-md-auto">
                            <label for="">Pilih Tanggal: </label>
                            <input type="date" min="{{ $minDateRange }}">
                        </div>
                        <div class="col-md-auto">
                            <label for="">Jam:</label>
                            <input type="time" >
                        </div>
                        <div class="col-md-auto">
                            <button class="btn btn-success" type="submit">Buat Jadwal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Riyaway Penimbangan</h4>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
@endsection