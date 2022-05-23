@extends('layouts.induk')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Data {{ $title }} Publik</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
    </div>
  </div>
</div>
<a href="rapat/publik/create" class="btn btn-primary mb-3">Tambah {{ $title }} Publik</a>

<table id="data" class="table table-striped" style="width:100%">
  <thead>
    <tr>
      <th>No</th>
      <th>penyelenggara</th>
      <th>Tempat</th>
      <th>Hari</th>
      <th>Tanggal</th>
      <th>Jam</th>
      <th>Keterangan</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($rapat as $ra)
    <tr>
      <td>{{ $loop -> iteration }}</td>
      <td>{{ $ra -> penyelenggara }}</td>
      <td>{{ $ra -> tempat }}</td>
      <td>{{ $ra -> hari }}</td>
      <td>{{ $ra -> tanggal }}</td>
      <td>{{ $ra -> jam }}</td>
      <td>{{ $ra -> keterangan }}</td>
      <td>
        <a href="rapat/publik/tampil/{{ $ra->id_rapat }}" class="badge btn-warning"><span data-feather="edit"></span>
        </a>
        <form action="rapat/publik/delete/{{ $ra->id_rapat }}" method="post" class="d-inline">
          @method('delete')
          @csrf
          <button class="badge btn-danger border-0" onclick="return confirm('Are you sure?')"><span
              data-feather="trash"></span></button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>



@endsection