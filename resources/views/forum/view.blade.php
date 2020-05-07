@extends('layouts.master')

@section('title')
  Forum Detail 
@endsection

@section('content')

<!-- Begin Page Content -->
        <div class="container-fluid">
          @if(session('sukses'))
          <div class="alert alert-primary" role="alert">
            {{session('sukses')}}
          </div>
        @endif

        <!-- Collapsable Card Example -->
              <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary">{{$forum->judul}}  {{$forum->created_at->diffForHumans()}}</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                  <div class="card-body" style="margin-bottom: 500px;">
                    {{$forum->content}}
                  </div>
                </div>
              </div>

@endsection

      