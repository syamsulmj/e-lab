<nav class="navbar navbar-expand-lg navbar-dark bg-dark customed-navbar">
  @if (url()->current() == action('HomeController@index'))
    <a class="navbar-brand navbar-title" href="{{ action('HomeController@index') }}">e-Lab</a>
  @else
    <a class="navbar-brand navbar-title" href="{{ url()->previous() }}">
      <i class="fas fa-arrow-left"></i>
    </a>
  @endif
  <button class="navbar-toggler customize-color" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="fas fa-bars"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    @if (url()->current() == action('HomeController@index'))
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ action('HomeController@logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
          <form id="logout-form" method="post" action="{{ action('HomeController@logout') }}" style="display: none;">
            {{ csrf_field() }}
          </form>
        </li>
      </ul>
    @else
      <ul class="navbar-nav mr-auto">
        @if (url()->current() == action('HomeController@index'))
          <li class="nav-item active">
        @else
          <li class="nav-item">
        @endif
          <a class="nav-link" href="{{ action('HomeController@index') }}">Home <span class="sr-only">(current)</span></a>
        </li>
        @if (url()->current() == action('HomeController@index'))
          <li class="nav-item active">
        @else
          <li class="nav-item">
        @endif
          @if (session('role') == 'student')
            <a class="nav-link" href="{{ action('HomeController@student_profile') }}">Profile</a>
          @elseif (session('role') == 'lecturer')
            <a class="nav-link" href="{{ action('AdminController@lecturer_profile') }}">Profile</a>
          @else
            <a class="nav-link" href="#">Profile</a>
          @endif
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ action('HomeController@logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
          <form id="logout-form" method="post" action="{{ action('HomeController@logout') }}" style="display: none;">
            {{ csrf_field() }}
          </form>
        </li>
      </ul>
    @endif
  </div>
</nav>
