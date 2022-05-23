@extends('layouts.induk')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data {{ $title }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
      </div>
    </div>
  </div>
  <a href="nonasn/create" class="btn btn-primary mb-3">Tambah {{ $title }}</a>
  
  <table id="data" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Instansi</th>
            <th>Bidang</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($nonasn as $non)
      <tr>
        <td>{{ $loop -> iteration }}</td>
        <td>{{ $non -> nama }}</td>
        <td>{{ $non -> instansi -> nama_in }}</td>
        <td>{{ $non -> bidang -> nama_bid }}</td>
        <td>
          <a href="nonasn/tampil/{{ $non->id_non }}" class="badge btn-warning"><span data-feather="edit"></span> </a>
          <form action="nonasn/delete/{{ $non->id_non }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge btn-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="trash"></span></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
    </tfoot>
</table>
@endsection

    
  
