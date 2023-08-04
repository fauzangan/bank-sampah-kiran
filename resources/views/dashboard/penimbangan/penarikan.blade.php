@extends('dashboard.layouts.main')
@section('content')
{{-- Symbol --}}
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path
            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </symbol>
</svg>
{{-- Symbol --}}
{{-- Alert --}}
@if(session()->has('errors'))
@foreach ($errors->all() as $error)
<div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0" width="24" height="24" role="img" aria-label="Success:">
        <use xlink:href="#exclamation-triangle-fill" />
    </svg>
    <div class="mx-2">
        {{ $error }}
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endforeach
@endif
{{-- Alert --}}

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Penarikan</h4>
        <p class="card-description">
            Penarikan berdasarkan jenis sampah
        </p>
        <form action="{{ route('penimbangan.penarikan.store') }}" method="POST" class="forms-sample">
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
                            @foreach($jenis_sampahs as $jenis_sampah)
                            <option value="{{ $jenis_sampah->id_jenis_sampah }}" data-harga={{ $jenis_sampah->
                                harga_penarikan_kg }}>{{ $jenis_sampah->nama_sampah }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-auto">
                    </div>
                </div>

            </div>
            <div class="form-group">
                <label for="">Nasabah</label>
                <div class="row">
                    <div class="col">
                        <select id="select-user" class="form-select form-select-sm" placeholder="Pilih Nasabah..."
                            name="id_user">
                            @foreach($users as $user)
                            <option value="{{ $user->id_user }}">{{ $user->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-auto">
                        <a href="javascript:void(0)" id="show-user" data-id=1 class="btn btn-info">Detail</a>
                    </div>
                </div>

            </div>
            <button type="submit" class="btn btn-primary btn-lg" style="color: white">Submit</button>
        </form>
    </div>
</div>

{{-- User Modal --}}
<div class="modal fade" id="userShowModal" tabindex="-1" aria-labelledby="userShowModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title">Detail Nasabah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-3">
                        <p><strong>Nama</strong>
                        <p><strong>Email</strong>
                        <p><strong>No Telepon</strong>
                        <p><strong>Alamat</strong>
                    </div>
                    <div class="col-9">
                        : <span id="nama"></span></p>
                        : <span id="email"></span></p>
                        : <span id="no_telepon"></span></p>
                        : <span id="alamat"></span></p>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('js/penarikan.js') }}"></script>
<script src="{{ asset('js/loadcell.js') }}"></script>
@endsection