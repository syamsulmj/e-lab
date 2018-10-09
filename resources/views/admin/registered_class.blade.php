@extends('master')
@section('content')
  <div class="container registered-class">
    <div class="title">
      <span>Registered Class</span>
    </div>
    @if (session('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif
    <div class="content-div">
      <div class="add-new-class">
        <a data-toggle="modal" data-target="#register_new_class">
          <span>Add New Class</span>
          <i class="fas fa-plus-square"></i>
        </a>
      </div>
      <div class="class-list-table">
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <th>Registered Class List</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @if ($registered_class)
              @foreach ($registered_class as $rc)
                <tr>
                  <td style="vertical-align: middle;">{{ $rc->class }}</td>
                  <td>
                    <button data-toggle="modal" data-target="#{{ $rc->class }}" type="button" class="btn btn-outline-light" name="button">Edit</button>
                  </td>
                </tr>
                @include('admin.edit_delete_registered_class_modal')
              @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
  @include('admin.register_new_class_modal')
@endsection
