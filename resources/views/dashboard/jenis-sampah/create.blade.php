@extends('dashboard.layouts.main')
@section('content')
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