@extends('master')
@section('content')
  <div class="login">
    <div class="title">
      <span>e-Lab</span>
    </div>
    <div class="content">
      <form action="{{ action('HomeController@login_checking') }}" method="POST">
        {{ csrf_field() }}
        @if ($errors->first('matrix-number'))
          <div class="input-group mb-3 customed-warning">
            <div class="input-group-prepend customed-logo-warning">
              <span class="input-group-text">
                <i class="fas fa-id-badge"></i>
              </span>
            </div>
            <input name="matrix-number" type="number" class="form-control" placeholder="Matrix Number">
          </div>
          <div class="warning-message">
            {{ $errors->first('matrix-number') }}
          </div>
        @else
          <div class="input-group mb-3 customed">
            <div class="input-group-prepend customed-logo">
              <span class="input-group-text">
                <i class="fas fa-id-badge"></i>
              </span>
            </div>
            @if (session('matrix-number'))
              <input name="matrix-number" type="number" class="form-control" placeholder="Matrix Number" value="{{ session('matrix-number') }}">
            @else
              <input name="matrix-number" type="number" class="form-control" placeholder="Matrix Number">
            @endif
          </div>
        @endif
        @if ($errors->first('password'))
          <div class="input-group mb-3 customed-warning">
            <div class="input-group-prepend customed-logo-warning">
              <span class="input-group-text">
                <i class="fas fa-key"></i>
              </span>
            </div>
            <input name="password" type="password" class="form-control" placeholder="Password">
          </div>
          <div class="warning-message">
            {{ $errors->first('password') }}
          </div>
        @else
          <div class="input-group mb-3 customed">
            <div class="input-group-prepend customed-logo">
              <span class="input-group-text">
                <i class="fas fa-key"></i>
              </span>
            </div>
            <input name="password" type="password" class="form-control" placeholder="Password">
          </div>
        @endif
        @if ($errors->first('status'))
          <div class="warning-message special">
            {{ $errors->first('status') }}
          </div>
        @endif
        <div class="customed-button">
          <a href="{{ action('HomeController@register') }}" class="btn btn-outline-light make-oval">Register</a>
          <button type="submit" class="btn btn-outline-light make-oval" data-toggle="modal" data-target="#loadingModal">Sign In</button>
        </div>
      </form>
    </div>
  </div>
@endsection
