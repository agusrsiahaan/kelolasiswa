@extends('layouts.master')

@section('title')
Data Siswa
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
            <div class="row" style="margin-bottom: 30px;">
              <div class="col-4">
                <h1 class="h3 mb-0 text-gray-800">Data Siswa</h1>
              </div>
               <div class="col-8">
                  <a style="float: right;" href="/siswa/export_excel" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report (.xlsx)</a>
                 <a style="float: right;" href="/siswa/export_pdf" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report (.pdf)</a>
               </div>
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
                        <form action="/siswa/create" method="POST" enctype="multipart/form-data">
                          {{csrf_field()}}
                          <!-- <div class="form-group{{$errors->has('nama_depan') ? 'has-error' : ''}}">
                            <label for="nama_depan">Nama Depan</label>
                            <input type="text" class="form-control" id="nama_depan" name="nama_depan" placeholder="Nama Depan">
                            @if($errors->has('nama_depan'))
                              <span class="help-block">{{$errors->first('nama_depan')}}</span>
                            @endif
                          </div> -->
                          <div class="form-group">
                            <label for="nama_depan">Nama Depan</label>
                            <input type="text" class="form-control" id="nama_depan" name="nama_depan" placeholder="Nama Depan" value="{{ old('nama_depan') }}">
                            <div>{{$errors->first('nama_depan')}}</div>
                          </div>
                          <div class="form-group">
                            <label for="nama_belakang">Nama Belakang</label>
                            <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" placeholder="Nama Depan" value="{{ old('nama_belakang') }}">
                            <div>{{$errors->first('nama_belakang')}}</div>
                          </div>
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Nama Depan" value="{{ old('email') }}">
                            <div>{{$errors->first('email')}}</div>
                          </div>
                          <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                              <option value="">Pilih</option>
                              <option value="L"{{(old('jenis_kelamin') == 'L') ? ' selected' : ''}}>Laki-laki</option>
                              <option value="P"{{(old('jenis_kelamin') == 'P') ? ' selected' : ''}}>Perempuan</option>
                            </select>
                            <div>{{$errors->first('jenis_kelamin')}}</div>
                          </div>
                          <div class="form-group">
                            <label for="jenis_kelamin">Agama</label>
                            <select class="form-control" name="agama" id="jenis_kelamin">
                              <option value="">Pilih</option>
                              <option value="I"{{(old('agama') == 'I') ? ' selected' : ''}}>Islam</option>
                              <option value="KP"{{(old('agama') == 'KP') ? ' selected' : ''}}>Kristen Protestan</option>
                              <option value="KK"{{(old('agama') == 'KK') ? ' selected' : ''}}>Kristen Katolik</option>
                              <option value="B"{{(old('agama') == 'B') ? ' selected' : ''}}>Budha</option>
                              <option value="H"{{(old('agama') == 'H') ? ' selected' : ''}}>Hindu</option>
                              <option value="K"{{(old('agama') == 'K') ? ' selected' : ''}}>Kong Hu Cu</option>
                            </select>
                            <div>{{$errors->first('agama')}}</div>
                          </div>
                          <div class="form-group">
                            <label for="avatar">Upload Gambar</label>
                            <input name="avatar" type="file" class="form-control" id="avatar">
                            <div>{{$errors->first('avatar')}}</div>
                          </div>
                          <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="3">{{old('alamat')}}</textarea>
                            <div>{{$errors->first('alamat')}}</div>
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
                      <th>Rata Nilai</th>
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
                     <th>Rata Nilai</th>
                     <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($siswa as $data)
                    <tr>
                      <td><a href="/siswa/{{$data->id}}/profile">{{$data->nama_depan}}</a></td>
                      <td><a href="/siswa/{{$data->id}}/profile">{{$data->nama_belakang}}</a></td>
                      <td>{{$data->jenis_kelamin}}</td>
                      <td>{{$data->agama}}</td>
                      <td>{{$data->alamat}}</td>
                      <td>{{$data->rataNilai()}}</td>
                      <td>
                        <a href="/siswa/{{$data->id}}/edit" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                        <a href="#" class="btn btn-danger delete" siswa-id="{{$data->id}}" siswa-nama="{{$data->nama_lengkap()}}"><i class="fas fa-trash"></i> Delete</a>
                      </td>
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

@section('footer')
  <script type="text/javascript">
    $('.delete').click(function(){
      var siswa_id = $(this).attr('siswa-id');
      var siswa_nama = $(this).attr('siswa-nama');
      swal({
      title: "Are you sure?",
      text: "Hapus data siswa "+ siswa_nama + "?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
       console.log(willDelete);
      if (willDelete) {
        window.location = "/siswa/"+siswa_id+"/delete";
      } else {
        swal("Your imaginary file is safe!");
      }
    });
    });
  </script>
@endsection
