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

{{-- Symbol --}}
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path
            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
    </symbol>
</svg>
{{-- Symbol --}}
{{-- Alert --}}
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0" width="24" height="24" role="img" aria-label="Success:">
        <use xlink:href="#check-circle-fill" />
    </svg>
    <div class="mx-2">
        {{ session('success') }}
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
{{-- Alert --}}

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