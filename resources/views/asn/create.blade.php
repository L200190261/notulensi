@extends('layouts.induk')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Tambah {{ $title }}</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
    </div>
  </div>
</div>

<form method="POST" action="/asn/create/proses">
  @csrf
  <div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control" id="nama" name="nama">
  </div>
  <div class="mb-3">
    <label for="nip" class="form-label">NIP</label>
    <input type="text" class="form-control" id="nip" name="nip">
  </div>
  <div class="mb-3">
    <label for="role" class="form-label">Jabatan</label>
    <select class="form-select form-select-sm mb-3" aria-label=".form-select-lg example" name="id_jabatan">
      <option selected>Pilih Jabatan</option>
      @foreach ($jabatan as $jab)
      <option value="{{ $jab -> id_jabatan }}">{{ $jab->nama_jab }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="role" class="form-label">Instansi</label>
    <select class="form-select form-select-sm mb-3" aria-label=".form-select-lg example" name="id_instansi">
      <option selected>Pilih Instansi</option>
      @foreach ($instansi as $in)
      <option value="{{ $in -> id_instansi }}">{{ $in->nama_in }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="role" class="form-label">Bidang</label>
    <select class="form-select form-select-sm mb-3" aria-label=".form-select-lg example" name="id_bidang">
      <option selected>Pilih Bidang</option>
      @foreach ($bidang as $bid)
      <option value="{{ $bid -> id_bidang }}">{{ $bid->nama_bid }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="role" class="form-label">Username</label>
    <input type="text" class="form-control" name="username">
  </div>
  <div class="mb-3">
    <label for="role" class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection