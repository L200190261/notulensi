@extends('layouts.induk')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data {{ $title }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
      </div>
    </div>
  </div>
  <a href="bidang/create" class="btn btn-primary mb-3">Tambah {{ $title }}</a>
  
  <table id="data" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Bidang</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($bidang as $bid)
      <tr>
        <td>{{ $loop -> iteration }}</td>
        <td>{{ $bid -> nama_bid }}</td>
        <td>
          <a href="bidang/tampil/{{ $bid->id_bidang }}" class="badge btn-warning"><span data-feather="edit"></span> </a>
          <form action="bidang/delete/{{ $bid->id_bidang }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge btn-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="trash"></span></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
</table>



@endsection

    
  
