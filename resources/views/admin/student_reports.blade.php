@extends('master')
@section('content')
  <div class="container upload-assignment">
    <div class="title">
      <span>Student Reports</span>
    </div>
    <div class="content-div">
      <div class="list-group content">
        @if ($registered_class)
          @foreach ($registered_class as $rc)
            <div class="row">
              <div class="col">
                <a href="#{{ $rc->class }}" class="menu list-group-item list-group-item-action" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="report-writing">
                  <span>{{ $rc->class }}</span>
                </a>
              </div>
              <button data-toggle="modal" data-target="#{{ 'modal-'.$rc->class }}" type="button" name="button" class="upload-new">
                <i class="fas fa-plus"></i>
              </button>
            </div>
            <div id="{{ $rc->class }}" class="collapse">
              @if (App\User::get_user_class($rc->class))
                @foreach (App\User::get_user_class($rc->class) as $user)
                  @if (App\StudentReport::get_student_report($user->matrix_number))
                    @foreach (App\StudentReport::get_student_report($user->matrix_number) as $student_report)
                      <a href="{{ route('student_report', ['matrix_number' => $student_report->matrix_number, 'id' => $student_report->id]) }}" class="menu-accordion list-group-item list-group-item-action">
                        <i class="fas fa-file-pdf"></i>
                        <span>{{ Helpers::neat($student_report->title) }}</span>
                      </a>
                    @endforeach
                  @endif
                @endforeach
              @endif
            </div>
          @endforeach
        @endif
    </div>
  </div>
@endsection
