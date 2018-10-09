@extends('master')
@section('content')
  <div class="container-fluid create-account">
    <div class="title">
      <span>Add New Account</span>
    </div>
    @if (session('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif
    <div class="content">
      <form action="{{ action('AdminController@create') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <label>Name</label>
          <input class="form-control" type="text" name="name" placeholder="John Mayers">
        </div>
        <div class="form-group">
          <label>Matrix Number</label>
          <input class="form-control" type="text" name="matrix_number" placeholder="123456789">
        </div>
        <div class="form-group">
          <label>Faculty</label>
          <input class="form-control" type="text" name="faculty" placeholder="Faculty of...">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input class="form-control" type="text" name="email" placeholder="elab@elab.com">
        </div>
        <div class="form-group">
          <label>Phone Number</label>
          <input class="form-control" type="text" name="phone_number" placeholder="012345678">
        </div>
        <div class="form-group">
          <label>Select Role</label>
          <select class="form-control" name="role">
            <option>Admin</option>
            <option>Lecturer</option>
          </select>
        </div>
        <div class="button-div">
          <button type="button" data-toggle="modal" data-target="#admin-create-account" class="btn btn-outline-light" name="button">Submit</button>
        </div>
        @include('admin.create_modal')
      </form>

    </div>
  </div>
@endsection
