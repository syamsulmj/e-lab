@extends('master')
@section('content')
  <div class="new-report container-fluid">
    <div class="title">
      <span>New Report</span>
      <br>
      <span class="reminder">(Please fill in all of the forms first to submit the report)</span>
    </div>
    @if ($errors->any())
      <div class="alert alert-danger" role="alert" style="margin-top: 20px;">
        <br>
        @foreach ($errors->all() as $e)
          <p>{{$e}}</p>
        @endforeach
      </div>
    @endif
    <div class="content">
      @if ($report)
        @foreach ($report as $re)
          <form action="{{ route('update_report', ['id' => $re->id]) }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label>Title</label>
              <input type="text" name="title" class="form-control" value="{{ Helpers::neat($re->title) }}">
            </div>
            <div class="form-group">
              <label>Introduction</label> <!-- 1 -->
              <textarea name="introduction" style="width: 100%;">{!! $re->introduction !!}</textarea>
            </div>
            <div class="form-group">
              <label>Problem Statement</label> <!-- 2 -->
              <textarea name="problem-statement" style="width: 100%;">{!! $re->problem_statement !!}</textarea>
            </div>
            <div class="form-group">
              <label>Objective</label> <!-- 3 -->
              <textarea name="objective" style="width: 100%;">{!! $re->objective !!}</textarea>
            </div>
            <div class="form-group">
              <label>Procedure</label> <!-- 4 -->
              <textarea name="procedure" style="width: 100%;">{!! $re->procedure !!}</textarea>
            </div>
            <div class="form-group">
              <label>Results</label> <!-- 5 -->
              <textarea name="results" style="width: 100%;">{!! $re->results !!}</textarea>
            </div>
            <div class="form-group">
              <label>Discussion</label> <!-- 6 -->
              <textarea name="discussion" style="width: 100%;">{!! $re->discussion !!}</textarea>
            </div>
            <div class="form-group">
              <label>Conclusion</label> <!-- 7 -->
              <textarea name="conclusion" style="width: 100%;">{!! $re->conclusion !!}</textarea>
            </div>
            <div class="form-group">
              <label>Reference</label> <!-- 8 -->
              <textarea name="reference" style="width: 100%;">{!! $re->reference !!}</textarea>
            </div>
            <button type="submit" class="btn btn-outline-light submit-button" name="button">Save</button>
          </form>
        @endforeach
      @endif
    </div>
    <script>tinymce.init({ selector:'textarea' });</script>
  </div>
@endsection
