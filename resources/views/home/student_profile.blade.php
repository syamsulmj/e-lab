@extends('master')
@section('content')
  <div class="container-fluid student-profile">
    <div class="text-center profile-image">
      <img src="{{ asset('images/default-profile-picture.jpg') }}" class="rounded-circle" alt="profile-image">
    </div>
    @if (session('success'))
      <div class="alert alert-success" style="margin-top: 20px;" role="alert">
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
    <div class="details">
      <form action="{{ action('HomeController@student_profile_update') }}" method="post">
        {{ csrf_field() }}
        @if ($user)
          @foreach ($user as $u)
            <div class="form-group">
              <div class="row">
                <div class="col">
                  <input onchange="MakeButtonAble()" class="off" disabled type="text" id="name" name="name" value="{{ Helpers::neat($u->name) }}">
                  <hr id="hr-name">
                </div>
                <button onclick="ChangeState('name')" class="btn btn-outline-light customed-edit-button" type="button" name="button">
                  <i class="fas fa-pen"></i>
                </button>
              </div>
              <div class="row">
                <div class="col">
                  <input onchange="MakeButtonAble()" class="off" disabled type="text" id="matrix-number" name="matrix-number" value="{{ $u->matrix_number }}">
                  <hr id="hr-matrix-number">
                </div>
                <button onclick="ChangeState('matrix-number')" class="btn btn-outline-light customed-edit-button" type="button" name="button">
                  <i class="fas fa-pen"></i>
                </button>
              </div>
              <div class="row">
                <div class="col">
                  <input onchange="MakeButtonAble()" class="off" disabled type="text" id="ic-number" name="ic-number" value="{{ $u->ic_number }}">
                  <hr id="hr-ic-number">
                </div>
                <button onclick="ChangeState('ic-number')" class="btn btn-outline-light customed-edit-button" type="button" name="button">
                  <i class="fas fa-pen"></i>
                </button>
              </div>
              <div class="row">
                <div class="col">
                  <input onchange="MakeButtonAble()" class="off" disabled type="text" id="faculty" name="faculty" value="{{ Helpers::neat($u->faculty) }}">
                  <hr id="hr-faculty">
                </div>
                <button onclick="ChangeState('faculty')" class="btn btn-outline-light customed-edit-button" type="button" name="button">
                  <i class="fas fa-pen"></i>
                </button>
              </div>
              <div class="row">
                <div class="col">
                  <input onchange="MakeButtonAble()" class="off" disabled type="text" id="programme" name="programme" value="{{ Helpers::neat($u->programme) }}">
                  <hr id="hr-programme">
                </div>
                <button onclick="ChangeState('programme')" class="btn btn-outline-light customed-edit-button" type="button" name="button">
                  <i class="fas fa-pen"></i>
                </button>
              </div>
              <div class="row">
                <div class="col">
                  <input onchange="MakeButtonAble()" class="off" disabled type="text" id="part" name="part" value="{{ Helpers::neat($u->part) }}">
                  <hr id="hr-part">
                </div>
                <button onclick="ChangeState('part')" class="btn btn-outline-light customed-edit-button" type="button" name="button">
                  <i class="fas fa-pen"></i>
                </button>
              </div>
              <div class="row">
                <div class="col">
                  <input onchange="MakeButtonAble()" class="off" disabled type="text" id="group" name="group" value="{{ Helpers::neat($u->group) }}">
                  <hr id="hr-group">
                </div>
                <button onclick="ChangeState('group')" class="btn btn-outline-light customed-edit-button" type="button" name="button">
                  <i class="fas fa-pen"></i>
                </button>
              </div>
              <div class="row">
                <div class="col">
                  <input onchange="MakeButtonAble()" class="off" disabled type="text" id="email" name="email" value="{{ $u->email }}">
                  <hr id="hr-email">
                </div>
                <button onclick="ChangeState('email')" class="btn btn-outline-light customed-edit-button" type="button" name="button">
                  <i class="fas fa-pen"></i>
                </button>
              </div>
              <div class="row">
                <div class="col">
                  <input onchange="MakeButtonAble()" class="off" disabled type="text" id="phone-number" name="phone-number" value="{{ $u->phone_number }}">
                  <hr id="hr-phone-number">
                </div>
                <button onclick="ChangeState('phone-number')" class="btn btn-outline-light customed-edit-button" type="button" name="button">
                  <i class="fas fa-pen"></i>
                </button>
              </div>
              <a href="#" data-toggle="modal" data-target="#change-password" class="btn btn-outline-dark" style="width: 100%; margin-top: 30px;">Change Password</a>
              <button id="submit-button" onclick="EnableAll()" type="submit" disabled class="btn btn-outline-primary" name="button" style="width: 100%; margin-top: 20px; margin-bottom: 30px;">Save</button>
            </div>
            <script type="text/javascript">
              var pass = "{{ $u->password }}";
            </script>
          @endforeach
        @endif
      </form>
      @include('home.change_password_modal')
    </div>
  </div>
  <script type="text/javascript">
    function ChangeState(id) {
      if ($('#'+id).is(':disabled')) {
        $('#'+id).removeClass('off').addClass('on').removeAttr('disabled');
        $('#hr-'+id).addClass('on');
      }
      else {
        $('#'+id).removeClass('on').addClass('off').attr('disabled', true);
        $('#hr-'+id).removeClass('on');
      }
    }

    function MakeButtonAble() {
      if ($('#submit-button').is(':disabled')) {
        $('#submit-button').removeAttr('disabled')
      }
    }

    function EnableAll() {
      $('#name').removeAttr('disabled');
      $('#matrix-number').removeAttr('disabled');
      $('#ic-number').removeAttr('disabled');
      $('#faculty').removeAttr('disabled');
      $('#programme').removeAttr('disabled');
      $('#part').removeAttr('disabled');
      $('#group').removeAttr('disabled');
      $('#email').removeAttr('disabled');
      $('#phone-number').removeAttr('disabled');
    }
  </script>
@endsection
