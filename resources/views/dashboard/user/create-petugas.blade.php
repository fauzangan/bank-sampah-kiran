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
        <h4 class="card-title">Form Tambah Petugas</h4>
        <p class="card-description">
            Biodata Petugas
        </p>
        <form action="{{ route('user.petugas.store') }}" class="forms-sample" method="POST">
            @csrf
            <div class="form-group row align-items-center">
                <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama..." required>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email..." required>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password"
                    placeholder="Password..." required>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password_confirmation"
                    name="password_confirmation" placeholder="Konfirmasi Password" required>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-center">
                <button type="submit" class="btn btn-info btn-lg"><i class="mdi mdi-content-save-edit-outline"></i>Submit Data</button>
            </div>
        </form>
    </div>
</div>

<script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
@endsection