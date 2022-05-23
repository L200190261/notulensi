@extends('layouts.induk')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah {{ $title }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
      </div>
    </div>
  </div>

  <form method="POST" action="/jabatan/create/proses">
    @csrf
    <div class="mb-3">
      <label for="jabatan" class="form-label">Nama Jabatan</label>
      <input type="text" class="form-control" id="nama_jab" name="nama_jab">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection