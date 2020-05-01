@extends('layouts.master')

@section('title')
  {{$siswa->nama_depan}}  {{$siswa->nama_belakang}} Profile's
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
    <h1 class="h3 mb-0 text-gray-800">{{$siswa->nama_depan}}  {{$siswa->nama_belakang}} Profile's </h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        
        <div class="row">
             <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-user"></i><strong class="card-title pl-2">Profiless Card</strong>
                            <a href="/siswa/{{$siswa->id}}/edit"style="float: right; color: #858796;"><i class="fas fa-edit"></i><strong class="card-title pl-2">Edit Profile</strong></a>
                        </div>
                        <div class="card-body">
                            <div class="mx-auto d-block">
                                <img class="rounded-circle mx-auto d-block" src="{{$siswa->getAvatar()}}" width="100" alt="Card image cap">
                                <h5 class="text-sm-center mt-2 mb-1">{{$siswa->nama_depan}} {{$siswa->nama_belakang}}</h5>
                                <div class="location text-sm-center"><!-- <i class="fas fa-venus-mars"></i> --> {{$siswa->jenis_kelamin}}</div>
                                <div class="location text-sm-center"><!-- <i class="fas fa-praying-hands"></i> -->  {{$siswa->agama}}</div>
                                <div class="location text-sm-center"><!-- <i class="fa fa-map-marker"> </i> --> {{$siswa->alamat}}</div>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <a href="#"> <i class="fas fa-book"></i> Mata Pelajaran <span class="badge badge-primary pull-right">{{$siswa->mapel->count()}}</span></a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#"> <i class="fa fa-tasks"></i> Recent Activity <span class="badge badge-danger pull-right">15</span></a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#"> <i class="fa fa-bell-o"></i> Notification <span class="badge badge-success pull-right">11</span></a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#"> <i class="fa fa-comments-o"></i> Message <span class="badge badge-warning pull-right r-activity">03</span></a>
                                </li>
                            </ul>
                            <div class="card-text text-sm-center">
                                <a href="#"><i class="fa fa-facebook pr-1"></i></a>
                                <a href="#"><i class="fa fa-twitter pr-1"></i></a>
                                <a href="#"><i class="fa fa-linkedin pr-1"></i></a>
                                <a href="#"><i class="fa fa-pinterest pr-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-8">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>Kode</th>
                              <th>Mata Pelajaran</th>
                              <th>Semester</th>
                              <th>Nilai</th>
                            </tr>
                          </thead>
                          <tfoot>
                            <tr>
                              <th>Kode</th>
                              <th>Mata Pelajaran</th>
                              <th>Semester</th>
                              <th>Nilai</th>
                            </tr>
                          </tfoot>
                          <tbody>
                            @foreach($siswa->mapel as $mapel)
                            <tr>
                              <td>{{$mapel->kode}}</td>
                              <td>{{$mapel->nama}}</td>
                              <td>{{$mapel->semester}}</td>
                              <td>{{$mapel->pivot->nilai}}</td>
                            </tr>
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

      