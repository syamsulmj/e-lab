<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('images/e-lab_logo.png') }}">
    <link href="{{asset('/css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <script src="{{asset('/js/app.js')}}"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <title>E-Lab</title>
  </head>
  @if (url()->current() == action('HomeController@login') || url()->current() == action('HomeController@register'))
    <body class="login-background">
  @else
    <body class="home-background">
      @include('shared.navbar')
  @endif
    @yield('content')
  </body>
</html>
