@extends('master')
@section('content')
  @if (session('role') == 'admin')
    @include('home.admin')
  @elseif (session('role') == 'lecturer')
    @include('home.lecturer')
  @else
    @include('home.student')
  @endif
@endsection
