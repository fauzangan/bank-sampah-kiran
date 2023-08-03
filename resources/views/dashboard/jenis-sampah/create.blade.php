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
      <h4 class="card-title">Form Jenis Sampah</h4>
      <p class="card-description">
        Tambah Jenis Sampah Baru
      </p>
      <form class="forms-sample" action="{{ route('jenis-sampah.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="nama_sampah">Nama Sampah</label>
          <input type="text" class="form-control" name="nama_sampah" id="nama_sampah" placeholder="Nama jenis sampah..">
        </div>
        <div class="form-group">
          <label for="harga_penarikan_kg">Harga Penarikan/kg</label>
          <input type="number" class="form-control" name="harga_penarikan_kg" id="harga_penarikan_kg" placeholder="Harga penarikan per kg..">
        </div>
        <div class="form-group">
          <label for="harga_setoran_kg">Harga Setoran/kg</label>
          <input type="number" class="form-control" name="harga_setoran_kg" id="harga_setoran_kg" placeholder="Harga setoran per kg..">
        </div>
        <button type="submit" class="btn btn-outline-primary btn-lg me-2">Submit</button>
      </form>
    </div>
  </div>
@endsection
<script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>