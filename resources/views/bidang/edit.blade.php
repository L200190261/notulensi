@extends('layouts.induk')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit {{ $title }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
      </div>
    </div>
  </div>

  @foreach ($data as $dd)
  <form method="POST" action="/bidang/edit/proses/{{ $dd->id_bidang }}">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="bidang" class="form-label">Nama Bidang</label>
      <input type="text" class="form-control" id="nama_bid" name="nama_bid" value="{{ $dd->nama_bid }}">
    </div>
    
    <button type="submit" class="btn btn-primary">Ubah</button>
  </form>
  @endforeach
  
@endsection