@extends('layouts.master')

@section('title')
  Edit Nilai {{$siswa->nama_depan}}  {{$siswa->nama_belakang}}
@endsection

@section('content')

<!-- Begin Page Content -->
        <div class="container-fluid">
          @if(session('sukses'))
          <div class="alert alert-primary" role="alert">
            {{session('sukses')}}
          </div>
        @endif
<!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Nilai {{$siswa->nama_depan}}  {{$siswa->nama_belakang}} </h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <!-- Button trigger modal -->
              <a href="/siswa"><button type="button" class="btn btn-primary">
                Kembali
              </button></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <form action="/siswa/{{$siswa->id}}/{{$mapel->id}}/updatenilai" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                  <label for="mapel">Mata Pelajaran</label>
                  <select class="form-control" name="mapel" id="mapel">
                    <option value="{{$mapel->id}}">{{$mapel->nama}}</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="nilai">Nilai</label>
                  <input type="text" class="form-control" id="nilai" name="nilai" placeholder="Nama Depan" value="{{$nilai}}">
                  <div>{{$errors->first('nilai')}}</div>
                </div>
                <div class="modal-footer">
                  <a href="/siswa"><button type="button" class="btn btn-secondary">Kembali</button></a>
                  <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
@endsection

      