@extends('layouts.induk')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data {{ $title }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
        </div>
    </div>
</div>
<a href="notulensi/create" class="btn btn-primary mb-3">Tambah {{ $title }}</a>

<table id="data" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>User</th>
            <th>Tempat</th>
            <th>Hari</th>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Keterangan</th>
            <th>Isi</th>
            <th>Status</th>
            <th>File</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($notulen as $not)
        <tr>
            <td>{{ $loop -> iteration }}</td>
            <td>@foreach ($user as $usr)
                @if($not->user_id == $usr->id)
                {{ $usr->username }}
                @endif
                @endforeach</td>
            <td>{{ $not -> tempat }}</td>
            <td>{{ $not -> hari }}</td>
            <td>{{ $not -> tanggal }}</td>
            <td>{{ $not -> jam }}</td>
            <td>{{ $not -> keterangan }}</td>
            <td>{!! $not -> isi !!}</td>
            <td>{{ $not -> status }}</td>
            <td><img src="{{ asset('/storage/'. $not->file) }}" style="width:100px;height:75px;"></td>
            <td>
                @if ($not->status == 'Draft')
                <a href="notulensi/tampil/{{ $not->id_notulen }}" class="badge btn-warning"><span
                        data-feather="edit"></span>
                </a>
                @endif
                <form action="notulensi/delete/{{ $not->id_notulen }}" method="post" class="d-inline">
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