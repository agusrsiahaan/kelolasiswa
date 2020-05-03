@extends('layouts.master')

@section('title')
  {{$guru->nama}} Profile's
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
  @if(session('sukses'))
  <div class="alert alert-primary" role="alert">
    {{session('sukses')}}
  </div>
@endif
@if(session('hapus'))
  <div class="alert alert-primary" role="alert">
    {{session('hapus')}}
  </div>
@endif

@if(session('error'))
  <div class="alert alert-warning" role="alert">
    {{session('error')}}
  </div>
@endif
<!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">List Mata Pelajaran yg diajar {{$guru->nama}}</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <div class="row">
               
        <div class="col-12">
          <button style="margin-left: 20px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Tambah Nilai
          </button>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai Siswa</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <!--FORM INSERT -->
                    <form action="#" method="POST" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <div class="form-group">
                        <label for="jenis_kelamin">Mata Pelajaran</label>
                        <select class="form-control" name="mapel_id" id="mapel_id">
      
                          <option value="2">2</option>
 
                        </select>
                        <div>{{$errors->first('mapel_id')}}</div>
                      </div>
                      <div class="form-group">
                        <label for="nama_belakang">Nilai</label>
                        <input type="text" class="form-control" id="nilai" name="nilai" placeholder="Nilai" value="{{ old('nilai') }}">
                        <div>{{$errors->first('nilai')}}</div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Mata Pelajaran</th>
                        <th>Semester</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Mata Pelajaran</th>
                        <th>Semester</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      @foreach($guru->mapel as $mapel)
                      <td>{{$mapel->nama}}</td>
                      <td>{{$mapel->semester}}</td>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection

      