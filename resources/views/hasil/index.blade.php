@extends('layouts.induk')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data {{ $title }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
        </div>
    </div>
</div>
<table id="data" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Rapat</th>
            <th>ID Notulen</th>
            <th>Notulen</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($hasil as $hsl)
        <tr>
            <td>{{ $loop -> iteration }}</td>
            <td>{{ $hsl -> id_rapat }}</td>
            <td>{{ $hsl -> id_notulen }}</td>
            <td>{{ $hsl -> notulen }}<br><a href="/hasil/download/{{ $hsl->id_hasil }}"
                    class="btn-secondary rounded text-decoration-none" style="width: 200px; height:25px;">
                    <p class="text-dark fw-bold">Download</p>
                </a></td>
            <td>
                <a href="hasil/tampil/{{ $hsl->id_hasil }}" class="badge btn-warning"><span data-feather="edit"></span>
                </a>
                <form action="hasil/delete/{{ $hsl->id_hasil }}" method="post" class="d-inline">
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