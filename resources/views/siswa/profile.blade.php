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
@if(session('error'))
  <div class="alert alert-warning" role="alert">
    {{session('error')}}
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
                    <form action="/siswa/{{$siswa->id}}/addnilai" method="POST" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <!-- <div class="form-group{{$errors->has('nama_depan') ? 'has-error' : ''}}">
                        <label for="nama_depan">Nama Depan</label>
                        <input type="text" class="form-control" id="nama_depan" name="nama_depan" placeholder="Nama Depan">
                        @if($errors->has('nama_depan'))
                          <span class="help-block">{{$errors->first('nama_depan')}}</span>
                        @endif
                      </div> -->
                      <div class="form-group">
                        <label for="jenis_kelamin">Mata Pelajaran</label>
                        <select class="form-control" name="mapel_id" id="mapel_id">
                        @foreach($mapel as $mp)
                          <option value="{{$mp->id}}">{{$mp->nama}}</option>
                        @endforeach
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
        <div class="panel">
          <div id="chartNilai">
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('footer')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
  Highcharts.chart('chartNilai', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monthly Average Rainfall'
    },
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: {
        categories: {!!json_encode($categories)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Grafik Mata Pelajaran',
        data: {!!json_encode($data)!!}

    }]
});
</script>
@endsection
      