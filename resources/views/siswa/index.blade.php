@extends('layouts.master')

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
            <h1 class="h3 mb-0 text-gray-800">Data Siswa</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Tambah Data Siswa
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <!--FORM INSERT -->
                        <form action="/siswa/create" method="POST">
                          {{csrf_field()}}
                          <div class="form-group">
                            <label for="nama_depan">Nama Depan</label>
                            <input type="text" class="form-control" id="nama_depan" name="nama_depan" placeholder="Nama Depan">
                          </div>
                          <div class="form-group">
                            <label for="nama_belakang">Nama Belakang</label>
                            <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" placeholder="Nama Depan">
                          </div>
                          <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                              <option value="">Pilih</option>
                              <option value="L">Laki-laki</option>
                              <option value="P">Perempuan</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="jenis_kelamin">Agama</label>
                            <select class="form-control" name="agama" id="jenis_kelamin">
                              <option value="">Pilih</option>
                              <option value="I">Islam</option>
                              <option value="KP">Kristen Protestan</option>
                              <option value="KK">Kristen Katolik</option>
                              <option value="B">Budha</option>
                              <option value="H">Hindu</option>
                              <option value="K">Kong Hu Cu</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
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
                          </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama Depan</th>
                      <th>Nama Belakang</th>
                      <th>Jenis Kelamin</th>
                      <th>Agama</th>
                      <th>Alamat</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                     <th>Nama Depan</th>
                     <th>Nama Belakang</th>
                     <th>Jenis Kelamin</th>
                     <th>Agama</th>
                     <th>Alamat</th>
                     <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($siswa as $data)
                    <tr>
                      <td>{{$data->nama_depan}}</td>
                      <td>{{$data->nama_belakang}}</td>
                      <td>{{$data->jenis_kelamin}}</td>
                      <td>{{$data->agama}}</td>
                      <td>{{$data->alamat}}</td>
                      <td><a href="/siswa/{{$data->id}}/edit" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
@endsection
