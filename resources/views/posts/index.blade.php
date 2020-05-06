@extends('layouts.master')

@section('title')
Data Post
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
                <h1 class="h3 mb-0 text-gray-800">Data Post</h1>
              </div>
               <div class="col-8">
                  <a style="float: right;" href="/siswa/export_excel" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report (.xlsx)</a>
                 <a style="float: right;" href="/siswa/export_pdf" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report (.pdf)</a>
               </div>
            </div>
    
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a href="{{route('posts.add')}}" class="btn btn-sm btn-primary">Add New Post</a>
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
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th>User</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th>User</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($posts as $data)
                    <tr>
                      <td>{{$data->id}}</td>
                      <td>{{$data->title}}</td>
                      <td>{{$data->user->name}}</td>
                      <td>
                      	<a target="_blank" href="{{route('site.single.post', $data->slug)}}" class="btn btn-info"><i class="fas fa-eye"></i> View</a>
                        <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                        <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
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
