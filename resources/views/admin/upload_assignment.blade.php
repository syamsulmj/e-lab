@extends('master')
@section('content')
  <div class="container upload-assignment">
    <div class="title">
      <span>Upload Assignment</span>
    </div>
    @if (session('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif
    @if ($errors->any())
      <div class="alert alert-danger" role="alert" style="margin-top: 20px;">
        <br>
        @foreach ($errors->all() as $e)
          <p>{{$e}}</p>
        @endforeach
      </div>
    @endif
    <div class="content-div">
      <div class="list-group content">
        @if ($registered_class)
          @foreach ($registered_class as $rc)
            <div class="row">
              <div class="col">
                <a href="#{{ $rc->class }}" class="menu list-group-item list-group-item-action" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="report-writing">
                  <span>{{ $rc->class }}</span>
                </a>
              </div>
              <button data-toggle="modal" data-target="#{{ 'modal-'.$rc->class }}" type="button" name="button" class="upload-new">
                <i class="fas fa-plus"></i>
              </button>
            </div>
            <div id="{{ $rc->class }}" class="collapse">
              @foreach (App\Assignment::get_file_list($rc->class) as $file)
                <a href="{{ $file->class_directory }}" target="_blank" class="menu-accordion list-group-item list-group-item-action">
                  <i class="fas fa-file-pdf"></i>
                  <span>{{ Helpers::neat($file->title) }}</span>
                </a>
              @endforeach
            </div>
            @include('admin.upload_file_modal')
          @endforeach
        @endif
    </div>
  </div>
@endsection
