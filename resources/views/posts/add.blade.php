@extends('layouts.master')

@section('title')
  Add New Post 
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
            <h1 class="h3 mb-0 text-gray-800">Add New Post </h1>
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
                <form action="{{route('posts.create')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title') }}">
                  <div>{{$errors->first('title')}}</div>
                </div>
                <div class="form-group">
                    <label for="editor">Content</label>
                    <textarea name="content" id="editor" class="form-control">{{old('content')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="thumbnail">Thumbnail</label>
                    <input name="thumbnail" type="file" class="form-control" id="thumbnail">
                    <div>{{$errors->first('thumbnail')}}</div>
                </div>
    
                <div class="modal-footer">
                  <a href="/siswa"><button type="button" class="btn btn-secondary">Kembali</button></a>
                  <button type="submit" class="btn btn-primary">Create</button>
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
@endsection
@section('footer')
<script>
ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .catch( error => {
        console.error( error );
    } );
    $(document).ready(function(){
        $('#lfm').filemanager('image');
    });
</script>
@endsection
      