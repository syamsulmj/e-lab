@extends('master')
@section('content')
  <div class="container">
    <div class="register-page-content">
      <div class="register-page-title">
        <h1 class="title">e-Lab</h1>
      </div>
      <div class="register-page-form">
        <form action="{{ action('HomeController@register_create') }}" method="POST">
          {{ csrf_field() }}
          @if ($errors->first('name'))
            <div class="input-group mb-3 customed-warning">
              <div class="input-group-prepend customed-logo-warning">
                <span class="input-group-text">
                  <i class="fas fa-user"></i>
                </span>
              </div>
                <input name="name" type="text" class="form-control" placeholder="Full Name">
            </div>
            <div class="warning-message">
              {{ $errors->first('name') }}
            </div>
          @else
            <div class="input-group mb-3 customed">
              <div class="input-group-prepend customed-logo">
                <span class="input-group-text">
                  <i class="fas fa-user"></i>
                </span>
              </div>
                <input name="name" type="text" class="form-control" placeholder="Full Name">
            </div>
          @endif
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
              <input name="matrix-number" type="number" class="form-control" placeholder="Matrix Number">
            </div>
          @endif
          @if ($errors->first('ic-number'))
            <div class="input-group mb-3 customed-warning">
              <div class="input-group-prepend customed-logo-warning">
                <span class="input-group-text">
                  <i class="fas fa-address-card"></i>
                </span>
              </div>
              <input name="ic-number" type="number" class="form-control" placeholder="IC Number (eg: 123456111234)">
            </div>
            <div class="warning-message">
              {{ $errors->first('ic-number') }}
            </div>
          @else
            <div class="input-group mb-3 customed">
              <div class="input-group-prepend customed-logo">
                <span class="input-group-text">
                  <i class="fas fa-address-card"></i>
                </span>
              </div>
              <input name="ic-number" type="number" class="form-control" placeholder="IC Number (eg: 123456111234)">
            </div>
          @endif
          @if ($errors->first('faculty'))
            <div class="input-group mb-3 customed-warning">
              <div class="input-group-prepend customed-logo-warning">
                <span class="input-group-text">
                  <i class="fas fa-building"></i>
                </span>
              </div>
                <input name="faculty" type="text" class="form-control" placeholder="Faculty">
            </div>
            <div class="warning-message">
              {{ $errors->first('faculty') }}
            </div>
          @else
            <div class="input-group mb-3 customed">
              <div class="input-group-prepend customed-logo">
                <span class="input-group-text">
                  <i class="fas fa-building"></i>
                </span>
              </div>
                <input name="faculty" type="text" class="form-control" placeholder="Faculty">
            </div>
          @endif
          @if ($errors->first('programme'))
            <div class="input-group mb-3 customed-warning">
              <div class="input-group-prepend customed-logo-warning">
                <span class="input-group-text">
                  <i class="fas fa-graduation-cap"></i>
                </span>
              </div>
                <input name="programme" type="text" class="form-control" placeholder="Programme">
            </div>
            <div class="warning-message">
              {{ $errors->first('programme') }}
            </div>
          @else
            <div class="input-group mb-3 customed">
              <div class="input-group-prepend customed-logo">
                <span class="input-group-text">
                  <i class="fas fa-graduation-cap"></i>
                </span>
              </div>
                <input name="programme" type="text" class="form-control" placeholder="Programme">
            </div>
          @endif
          @if ($errors->first('part'))
            <div class="input-group mb-3 customed-warning">
              <div class="input-group-prepend customed-logo-warning">
                <span class="input-group-text">
                  <i class="fas fa-book-reader"></i>
                </span>
              </div>
                <input name="part" type="text" class="form-control" placeholder="Part (eg: 1, 2, 3,...)">
            </div>
            <div class="warning-message">
              {{ $errors->first('part') }}
            </div>
          @else
            <div class="input-group mb-3 customed">
              <div class="input-group-prepend customed-logo">
                <span class="input-group-text">
                  <i class="fas fa-book-reader"></i>
                </span>
              </div>
                <input name="part" type="text" class="form-control" placeholder="Part (eg: 1, 2, 3,...)">
            </div>
          @endif
          @if ($errors->first('group'))
            <div class="input-group mb-3 customed-warning">
              <div class="input-group-prepend customed-logo-warning">
                <span class="input-group-text">
                  <i class="fas fa-users"></i>
                </span>
              </div>
                <input name="group" oninput="this.value = this.value.toUpperCase()" type="text" class="form-control" placeholder="Group">
            </div>
            <div class="warning-message">
              {{ $errors->first('group') }}
            </div>
          @else
            <div class="input-group mb-3 customed">
              <div class="input-group-prepend customed-logo">
                <span class="input-group-text">
                  <i class="fas fa-users"></i>
                </span>
              </div>
                <input name="group" oninput="this.value = this.value.toUpperCase()" type="text" class="form-control" placeholder="Group">
            </div>
          @endif
          @if ($errors->first('email'))
            <div class="input-group mb-3 customed-warning">
              <div class="input-group-prepend customed-logo-warning">
                <span class="input-group-text">
                  <i class="fas fa-envelope"></i>
                </span>
              </div>
                <input name="email" type="email" class="form-control" placeholder="Email">
            </div>
            <div class="warning-message">
              {{ $errors->first('email') }}
            </div>
          @else
            <div class="input-group mb-3 customed">
              <div class="input-group-prepend customed-logo">
                <span class="input-group-text">
                  <i class="fas fa-envelope"></i>
                </span>
              </div>
                <input name="email" type="email" class="form-control" placeholder="Email">
            </div>
          @endif
          @if ($errors->first('phone-number'))
            <div class="input-group mb-3 customed-warning">
              <div class="input-group-prepend customed-logo-warning">
                <span class="input-group-text">
                  <i class="fas fa-mobile-alt"></i>
                </span>
              </div>
                <input name="phone-number" type="text" class="form-control" placeholder="Phone Number">
            </div>
            <div class="warning-message">
              {{ $errors->first('phone-number') }}
            </div>
          @else
            <div class="input-group mb-3 customed">
              <div class="input-group-prepend customed-logo">
                <span class="input-group-text">
                  <i class="fas fa-mobile-alt"></i>
                </span>
              </div>
                <input name="phone-number" type="text" class="form-control" placeholder="Phone Number">
            </div>
          @endif
          @if ($errors->first('checking'))
            <div class="warning-message special">
              {{ $errors->first('checking') }}
            </div>
          @endif
          <div class="customed-button">
            <button type="submit" class="btn btn-outline-light make-oval" data-toggle="modal" data-target="#loadingModal">Register</button>
          </div>
          <div class="redirect-link">
            <a href="{{ action('HomeController@login') }}">Go back to login page</a>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
