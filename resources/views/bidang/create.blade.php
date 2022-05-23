@extends('layouts.induk')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah {{ $title }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
      </div>
    </div>
  </div>

  <form method="POST" action="/bidang/create/proses">
    @csrf
    <div class="mb-3">
      <label for="bidang" class="form-label">Nama Bidang</label>
      <input type="text" class="form-control" id="nama_bid" name="nama_bid">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection