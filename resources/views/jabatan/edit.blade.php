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
  <form method="POST" action="/jabatan/edit/proses/{{ $dd->id_jabatan }}">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="username" class="form-label">Nama Jabatan</label>
      <input type="text" class="form-control" id="nama_jab" name="nama_jab" value="{{ $dd->nama_jab }}">
    </div>
    
    <button type="submit" class="btn btn-primary">Ubah</button>
  </form>
  @endforeach
  
@endsection