@extends('dashboard.layouts.main')
@section('content')
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session()->has('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{ session('warning') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card mx-5 px-4 py-2">
    <div class="card-body">
        <h4 class="card-title">Ubah Password</h4>
        <form action="{{ route('user.change-password.store') }}" class="forms-sample" method="POST">
            @csrf
            <div class="form-group row align-items-center">
                <label for="old_password" class="col-sm-2 col-form-label">Password Lama</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="old_password" id="old_password">
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="password" class="col-sm-2 col-form-label">Password Baru</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" id="password">
                </div>
            </div>
            <div class="form-group row align-items-center">
                <label for="password_confirmation" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-center">
                <button type="submit" class="btn btn-warning btn-lg"><i class="mdi mdi-content-save-edit-outline"></i>Update Password</button>
            </div>
        </form>
    </div>
</div>
@endsection
<script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>