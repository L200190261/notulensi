@extends('layouts.induk')
@section('konten')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      @if(count($errors) > 0)
      <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        {{ $error }} <br />
        @endforeach
      </div>
      @endif
    </div>
  </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"> Tambah Data Pegawai</h6>
    </div>
    <div class="card-body">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        <i class="fa fa-plus"></i>
      </button>
      <div class="table-responsive">
        <div class="row">
          <div class="col-sm-12">
            <table class="table table-bordered dataTable" id="dataTable" role="grid" aria-describedby="dataTable_info"
              style="width: 100%;" width="100%" cellspacing="0">
              <thead>
                {{-- <tr role="row">
                  <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                    style="width: 162px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">
                    Foto</th> --}}
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                    style="width: 248px;" aria-label="Position: activate to sort column ascending">NIP</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                    style="width: 116px;" aria-label="Office: activate to sort column ascending">Nama</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                    style="width: 116px;" aria-label="Office: activate to sort column ascending">Jabatan</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                    style="width: 116px;" aria-label="Office: activate to sort column ascending">Instansi</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                    style="width: 116px;" aria-label="Office: activate to sort column ascending">Bidang</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                    style="width: 116px;" aria-label="Office: activate to sort column ascending">Status</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                    style="width: 116px;" aria-label="Office: activate to sort column ascending">Aksi</th>
              </thead>
              <tfoot>
              </tfoot>
              <tbody>
                {{-- @foreach($pegawai as $add) --}}
                <tr role="row" class="odd">
                  {{-- <td class="sorting_1"><img src="foto/{{$p->foto}}" width="100px" /></td> --}}
                  <td>NIP</td>
                  <td>Nama</td>
                  {{-- <td>{{$p->t_lahir}}, {{$p->tgl_lahir}}</td> --}}
                  <td>Jabatan</td>
                  <td>Instansi</td>
                  <td>Bidang</td>
                  <td>ASN/NON</td>
                  <td><a class="btn btn-secondary" href="/pegawai/profile/"><i class="fa fa-list"></i></a>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalEdit"><i
                        class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger mt-1" data-toggle="modal" data-target="#ModalDelete"><i
                        class="fa fa-trash"></i></button>
                  </td>
                </tr>
                @endsection