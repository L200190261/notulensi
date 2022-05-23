@extends('layouts.induk')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pilih Jenis {{ $title }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
      </div>
    </div>
  </div>
  <form>
      <button onclick="location.href='/publik'" type="button" class="btn btn-primary">Public</button>
      <button onclick="location.href='/private'" type="button" class="btn btn-primary">Private</button>
  </form>



@endsection

    
  
