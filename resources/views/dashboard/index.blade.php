@extends('layouts.induk')

@section('container')
@if (auth()->user()->role == 'Administrator')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">{{ $title }}</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
    </div>
  </div>
</div>
<h2 class="pt-5 text-center">Selamat Datang {{ auth()->user()->username }}</h2>
<div class="menu-content d-flex flex-wrap justify-content-center py-5">
  <a href="/pengguna" class="text-decoration-none">
    <div class="card text-light bg-primary mx-3 my-2 d-flex flex-column justify-content-center position-relative">
      <h4 class="card-title ps-3">Pengguna</h4>
      <h4 class="text-light ps-3">{{ $pengguna }}</h4>
      <i class="fa-solid fa-user position-absolute logo-content"></i>
    </div>
  </a>
  <a href="/asn" class="text-decoration-none">
    <div class="card text-light bg-primary mx-3 my-2 d-flex flex-column justify-content-center position-relative">
      <h4 class="card-title ps-3">ASN</h4>
      <h4 class="text-light ps-3">{{ $asn }}</h4>
      <i class="fa-solid fa-users position-absolute logo-content"></i>
    </div>
  </a>
  <a href="/nonasn" class="text-decoration-none">
    <div class="card text-light bg-primary mx-3 my-2 d-flex flex-column justify-content-center position-relative">
      <h4 class="card-title ps-3">Non ASN</h4>
      <h4 class="text-light ps-3">{{ $nonasn }}</h4>
      <i class="fa-solid fa-users position-absolute logo-content"></i>
    </div>
  </a>
  <a href="/rapat" class="text-decoration-none">
    <div class="card text-light bg-primary mx-3 my-2 d-flex flex-column justify-content-center position-relative">
      <h4 class="card-title ps-3">Rapat</h4>
      <h4 class="text-light ps-3">{{ $rapat }}</h4>
      <i class="fa-solid fa-handshake position-absolute logo-content"></i>
    </div>
  </a>
  <a href="/notulensi" class="text-decoration-none">
    <div class="card text-light bg-primary mx-3 my-2 d-flex flex-column justify-content-center position-relative">
      <h4 class="card-title ps-3">Notulensi</h4>
      <h4 class="text-light ps-3">{{ $notulen }}</h4>
      <i class="fa-solid fa-clipboard position-absolute logo-content"></i>
    </div>
  </a>
  <a href="/hasil" class="text-decoration-none">
    <div class="card text-light bg-primary mx-3 my-2 d-flex flex-column justify-content-center position-relative">
      <h4 class="card-title ps-3">Hasil</h4>
      <h4 class="text-light ps-3">{{ $hasil }}</h4>
      <i class="fa-solid fa-envelope-circle-check position-absolute logo-content"></i>
    </div>
  </a>
  <a href="/jabatan" class="text-decoration-none">
    <div class="card text-light bg-primary mx-3 my-2 d-flex flex-column justify-content-center position-relative">
      <h4 class="card-title ps-3">Jabatan</h4>
      <h4 class="text-light ps-3">{{ $jabatan }}</h4>
      <i class="fa-solid fa-map-pin position-absolute logo-content"></i>
    </div>
  </a>
  <a href="/instansi" class="text-decoration-none">
    <div class="card text-light bg-primary mx-3 my-2 d-flex flex-column justify-content-center position-relative">
      <h4 class="card-title ps-3">Instansi</h4>
      <h4 class="text-light ps-3">{{ $instansi }}</h4>
      <i class="fa-solid fa-house-user position-absolute logo-content"></i>
    </div>
  </a>
  <a href="/bidang" class="text-decoration-none">
    <div class="card text-light bg-primary mx-3 my-2 d-flex flex-column justify-content-center position-relative">
      <h4 class="card-title ps-3">Bidang</h4>
      <h4 class="text-light ps-3">{{ $bidang }}</h4>
      <i class="fa-solid fa-user-tie position-absolute logo-content"></i>
    </div>
  </a>
</div>
@else
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">{{ $title }}</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
    </div>
  </div>
</div>
@if (auth()->user()->role == 'ASN')
<h2 class="text-center pt-3 pb-5">Selamat Datang {{ $asn->nama }}</h2>
@else
<h2 class="text-center pt-3 pb-5">Selamat Datang {{ $nonasn->nama }}</h2>
@endif
<div class="row">
  <div class="col" style="padding-left:125px;">
    @if ($hasil)
    <h1 class=" h2 mb-5" style="padding-left:120px;">Hasil</h1>
    @for ($i = 0; $i <= count($hasil[0])-1; $i++) <div
      class=" card text-dark my-4 d-flex flex-column justify-content-center position-relative">
      <h4 class="card-title text-dark ps-3">{{ $hasil[0][$i]->notulen }}</h4>
      <a href="/hasil/download/{{ $hasil[0][$i]->id_hasil }}"
        class="btn-secondary w-50 rounded mx-auto text-decoration-none" style="width: 200px; height:25px;">
        <p class="text-center fw-bold mb-2">Download</p>
  </div>
  </a>
  @endfor
  @else
  <h1 class="h2 mb-5">Hasil</h1>
  @endif
</div>
<div class="col" style="padding-left:600px;">
  <h1 class="h2 mb-5" style="padding-left:100px;">Rapat</h1>
  @foreach ($rapat as $rpt)
  <div class=" card text-dark my-4 d-flex flex-column justify-content-center position-relative">
    <h4 class="card-title mt-3 ps-3">Rapat {{ $rpt->keterangan }}</h4>
    <h4 class="text-muted ps-3">{{ $rpt->tempat }}</h4>
    <h5 class="text-muted mb-3 ps-3">{{ $rpt->jam }} - {{ $rpt->tanggal }}</h5>
    <i class="fa-solid fa-handshake position-absolute logo-content"></i>
  </div>
  @endforeach
</div>
</div> @endif @endsection