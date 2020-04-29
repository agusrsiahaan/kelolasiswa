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
            <h1 class="h3 mb-0 text-gray-800">Edit data {{$siswa->nama_depan}}  {{$siswa->nama_belakang}} </h1>
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
                <form action="/siswa/{{$siswa->id}}/update" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                  <label for="nama_depan">Nama Depan</label>
                  <input type="text" class="form-control" id="nama_depan" name="nama_depan" placeholder="Nama Depan" value="{{$siswa->nama_depan}}">
                </div>
                <div class="form-group">
                  <label for="nama_belakang">Nama Belakang</label>
                  <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" placeholder="Nama Depan" value="{{$siswa->nama_belakang}}">
                </div>
                <div class="form-group">
                  <label for="jenis_kelamin">Jenis Kelamin</label>
                  <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                    <option value="">Pilih</option>
                    <option value="L" {{ $siswa->jenis_kelamin == 'Laki-laki' ? 'selected' : ''}}>Laki-laki</option>
                    <option value="P" {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="jenis_kelamin">Agama</label>
                  <select class="form-control" name="agama" id="jenis_kelamin">
                    <option value="">Pilih</option>
                    <option value="I" {{ $siswa->agama == 'Islam' ? 'selected' : ''}}>Islam</option>
                    <option value="KP" {{ $siswa->agama == 'Kristen Protestan' ? 'selected' : ''}}>Kristen Protestan</option>
                    <option value="KK" {{ $siswa->agama == 'Kristen Katolik' ? 'selected' : ''}}>Kristen Katolik</option>
                    <option value="B" {{ $siswa->agama == 'Budha' ? 'selected' : ''}}>Budha</option>
                    <option value="H" {{ $siswa->agama == 'Hindu' ? 'selected' : ''}}>Hindu</option>
                    <option value="K" {{ $siswa->agama == 'Kong Hu Cu' ? 'selected' : ''}}>Kong Hu Cu</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea class="form-control" name="alamat" id="alamat" rows="3">{{$siswa->alamat}}</textarea>
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

      