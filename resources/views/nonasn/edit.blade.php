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
<form method="POST" action="/nonasn/edit/proses/{{ $dd->id_non }}">
  @method('put')
  @csrf
  <div class="mb-3">
    <label for="nama" class="form-label">nama</label>
    <input type="text" class="form-control" id="nama" name="nama" value="{{ $dd->nama }}">
  </div>
  </div>
  <div class="mb-3">
    <label for="instansi" class="form-label">Instansi</label>
    <select class="form-select form-select-sm mb-3" aria-label=".form-select-lg example" name="id_instansi">
      @foreach ($instansi as $in)
      <option value="{{ $in -> id_instansi }}" @if ($in -> id_instansi == $dd -> id_instansi) selected

        @endif>{{ $in->nama_in }}</option>
      @endforeach
    </select>
  </div>
  </div>
  <div class="mb-3">
    <label for="bidang" class="form-label">Bidang</label>
    <select class="form-select form-select-sm mb-3" aria-label=".form-select-lg example" name="id_bidang">
      @foreach ($bidang as $bid)
      <option value="{{ $bid -> id_bidang }}" @if ($bid -> id_bidang == $dd -> id_bidang) selected

        @endif>{{ $bid->nama_bid }}</option>
      @endforeach
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Ubah</button>
</form>
@endforeach

@endsection