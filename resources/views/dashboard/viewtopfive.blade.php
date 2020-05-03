@extends('layouts.master')

@section('title')
Peringkat 5 Besar Siswa
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
          <div class="alert alert-danger" role="alert">
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
            <h1 class="h3 mb-0 text-gray-800">Peringkat 5 Besar Siswa</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Rangking</th>
                      <th>Nama</th>
                      <th>Nilai</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Rangking</th>
                      <th>Nama</th>
                      <th>Nilai</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  @php
                  	$ranking = 1;
                  @endphp
                  @foreach($siswa as $s)
                  <tr>
                   <td>{{$ranking}}</td>
                   <td>{{$s->nama_lengkap()}}</td>
                   <td>{{$s->rataNilai}}</td>
               	  </tr>
               	  @php
               	   $ranking++;
               	  @endphp
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
@endsection
