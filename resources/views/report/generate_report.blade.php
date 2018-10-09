@extends('master2')
@section('content')
  <div class="container generate-report">
    <div id="loader" class="spinner">
      <span>
        <i class="fas fa-spinner fa-spin"></i>
      </span>
      <div style="font-size: 1rem;">
        Loading...
      </div>
    </div>
    <div id="front-page" class="front-page">
      <div class="report-image">
        <img src="{{ asset('images/logo_uitm.png') }}" alt="uitm-logo">
      </div>
      <div class="university-name">
        <span>UNIVERSITI TEKNOLOGI MARA</span>
      </div>
      <div id="title" class="title">
        <span>{{ Helpers::neat($report->title) }}</span>
      </div>
      <div class="name">
        <span>{{ Helpers::neat($student->name) }}</span>
      </div>
      <div class="matrix-number">
        <span>{{ $student->matrix_number }}</span>
      </div>
      <div id="group" class="group">
        <span>{{ $student->group }}</span>
      </div>
    </div>
    <div id="introduction-page" class="content-page">
      {!! $report->introduction !!}
    </div>
    <div id="problem-statement-page" class="content-page">
      {!! $report->problem_statement !!}
    </div>
    <div id="objective-page" class="content-page">
      {!! $report->objective !!}
    </div>
    <div id="procedure-page" class="content-page">
      {!! $report->procedure !!}
    </div>
    <div id="results-page" class="content-page">
      {!! $report->results !!}
    </div>
    <div id="discussion-page" class="content-page">
      {!! $report->discussion !!}
    </div>
    <div id="conclusion-page" class="content-page">
      {!! $report->conclusion !!}
    </div>
    <div id="reference-page" class="content-page">
      {!! $report->reference !!}
    </div>
    <div class="selection-button">
      <div class="row">
        <div class="col">
          <button onclick="printing()" class="btn btn-outline-info">Print</button>
        </div>
        <div class="col">
          <button data-toggle="modal" data-target="#send2whatsapp" class="btn btn-outline-info">Send to Whatsapp</button>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <button type="button" onclick="selecting('front-page')" id="front" class="btn btn-outline-primary">Front Page</button>
        </div>
        <div class="col">
          <button type="button" onclick="selecting('introduction-page')" id="introduction" class="btn btn-outline-primary">Introduction</button>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <button type="button" onclick="selecting('problem-statement-page')" id="problem-statement" class="btn btn-outline-primary">Problem Statement</button>
        </div>
        <div class="col">
          <button type="button" onclick="selecting('objective-page')" id="objective" class="btn btn-outline-primary">Objective</button>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <button type="button" onclick="selecting('procedure-page')" id="procedure" class="btn btn-outline-primary">Procedure</button>
        </div>
        <div class="col">
          <button type="button" onclick="selecting('results-page')" id="results" class="btn btn-outline-primary">Results</button>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <button type="button" onclick="selecting('discussion-page')" id="discussion" class="btn btn-outline-primary">Discussion</button>
        </div>
        <div class="col">
          <button type="button" onclick="selecting('conclusion-page')" id="conclusion" class="btn btn-outline-primary">Conclusion</button>
        </div>
      </div>
      <button
        type="button"
        onclick="selecting('reference-page')"
        class="btn btn-outline-primary"
        @if (!session('login?'))
          style="margin-bottom: 25px;"
        @endif>
        Reference
      </button>
      @if (session('login?'))
        <a href="{{ action('HomeController@index') }}" class="btn btn-outline-dark first">Back to Home</a>
        <a href="{{ route('report_editing', ['id' => $report->id]) }}" class="btn btn-outline-warning">Edit Report</a>
      @endif
    </div>
  </div>
  @include('report.send_whatsapp_modal')
  <script type="text/javascript">
    var temp = 'front-page';
    var count = 0;
    var items = ['front-page', 'introduction-page', 'problem-statement-page', 'objective-page', 'procedure-page', 'results-page', 'discussion-page', 'conclusion-page', 'reference-page'];

    function selecting(selection) {
      if (count == 0) {
        $('#front-page').hide();
      }
      $('#loader').show();
      for (var i = 0; i < items.length; i++) {
        if (items[i] == selection) {

          setTimeout(function () {
              $('#loader').hide();
              $('#'+selection).show();
              console.log('#'+selection);
          }, 800);
          count++;
          temp = selection;
        }
        else {
          $('#'+items[i]).hide();
        }
      }
    }

    function printing() {
      $('#title').addClass('printing-margin');
      $('#group').addClass('printing-margin');
      $('.content-page').addClass('printing');
      for (var i = 0; i < items.length; i++) {
        $('#'+items[i]).show();
      }
      setTimeout(function () {
        for (var i = 0; i < items.length; i++) {
          $('#'+items[i]).hide();
        }
        $('#'+temp).show();
        $('#title').removeClass('printing-margin');
        $('#group').removeClass('printing-margin');
        $('.content-page').removeClass('printing');
      }, 1000);

      window.print();
      return false;
    }
  </script>
@endsection
