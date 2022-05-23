@extends('layouts.induk')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Data {{ $title }} Private</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
    </div>
  </div>
</div>
<a href="rapat/private/create" class="btn btn-primary mb-3">Tambah {{ $title }} Private</a>

<table id="data" class="table table-striped" style="width:100%">
  <thead>
    <tr>
      <th class="col">No</th>
      <th class="col">Penyelenggara</th>
      <th class="col">Tempat</th>
      <th class="col">Hari</th>
      <th class="col">Tanggal</th>
      <th class="col">Jam</th>
      <th class="col">Keterangan</th>
      <th class="col-2">Peserta ASN</th>
      <th class="col-2">Peserta NON ASN</th>
      <th class="col">Action</th>
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
      {{-- <td>{{ in_array($ra->id_asn) }}</td> --}}
      <td>
        <?php $nama = str_replace('[', "", $ra->id_asn); $nama = str_replace(']', "", $nama);$nama = str_replace('"', " ", $nama);echo $nama;?>
      </td>
      <td>
        <?php $nama = str_replace('[', "", $ra->id_non); $nama = str_replace(']', "", $nama);$nama = str_replace('"', " ", $nama);echo $nama;?>
      </td>
      <td>
        <a href="rapat/private/tampil/{{ $ra->id_rapat }}" class="badge btn-warning"><span data-feather="edit"></span>
        </a>
        <form action="rapat/private/delete/{{ $ra->id_rapat }}" method="post" class="d-inline">
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