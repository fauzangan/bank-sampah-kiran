@extends('dashboard.layouts.main')
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Biodata Diri</h4>
        <p class="card-description">
            Form Biodata Diri (Terakhir di Update {{ $user->updated_at->diffForHumans() }})
        </p>
        <form action="{{ route('user.detail-user.store') }}" class="forms-sample" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group row align-items-center">
                <label for="created_at" class="col-sm-2 col-form-label">Tanggal Mendaftar</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="created_at" value="{{ $user->tanggal_mendaftar }}" disabled>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $user->nama }}" disabled>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" disabled>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="no_telepon" class="col-sm-2 col-form-label">No Handphone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ $user->no_telepon }}">
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat Rumah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $user->alamat }}">
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-center">
                <button type="submit" class="btn btn-warning btn-lg"><i class="mdi mdi-content-save-edit-outline"></i>Update Data</button>
            </div>
        </form>
    </div>
</div>

@endsection
<script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>