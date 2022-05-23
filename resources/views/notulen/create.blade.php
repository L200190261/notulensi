@extends('layouts.induk')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah {{ $title }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
        </div>
    </div>
</div>

<form method="POST" action="/notulensi/create/proses" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    <div class="mb-3">
        <label for="role" class="form-label">Rapat</label>
        <select class="form-select form-select-sm mb-3" aria-label=".form-select-lg example" name="id_rapat">
            <option selected>Pilih Rapat</option>
            @foreach ($rapat as $rpt)
            <option value="{{ $rpt -> id_rapat }}">{{ $rpt->id_rapat }} - {{ $rpt->keterangan }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="role" class="form-label">Status</label>
        <select class="form-select form-select-sm mb-3" aria-label=".form-select-lg example" name="status">
            <option selected>Pilih Status</option>
            <option value="Draft">Draft</option>
            <option value="Publish">Publish</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="isi" class="form-label">Isi</label>
        <textarea id="editor" style="height:500px;" name="isi">
        </textarea>
    </div>
    <div class=" mb-3">
        <label for="file" class="form-label">File</label>
        <input type="file" class="form-control" id="file" name="file">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection