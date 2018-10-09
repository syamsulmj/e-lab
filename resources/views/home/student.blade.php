<div class="home container-fluid">
  <div class="user-details-div">
    <div class="user-details">
      <div class="user-image">
        <img src="{{ asset('images/default-profile-picture.jpg') }}" alt="">
      </div>
      <div style="padding: 1em;"></div>
      <div class="user-info">
        <div class="name">
          {{ Helpers::neat($user->name) }}
        </div>
        <div class="matrix-number">
          {{ $user->matrix_number }}
        </div>
      </div>
    </div>
  </div>
  <hr style="margin-left: -15px; margin-right: -15px; margin-top: 0; margin-bottom: 0; border-top: 2px solid #ffffff;">
  <div class="content-div">
    <div class="list-group content">
      <a href="{{ action('HomeController@student_profile') }}" class="menu list-group-item list-group-item-action">
        <i class="fas fa-user-circle"></i>
        <span>My Profile</span>
      </a>
      <a href="#report-writing" class="menu list-group-item list-group-item-action" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="report-writing">
        <i class="fas fa-file-signature"></i>
        <span>Report Writing</span>
      </a>
      <div id="report-writing" class="collapse">
        <a href="{{ action('ReportController@new_report') }}" class="menu-accordion first list-group-item list-group-item-action">
          <i class="fas fa-plus-circle"></i>
          <span>Write New Report</span>
        </a>
        @if ($student_report)
          @foreach ($student_report as $sr)
            <a href="{{ route('student_report', ['matrix_number' => $sr->matrix_number, 'id' => $sr->id]) }}" class="menu-accordion list-group-item list-group-item-action">
              <i class="fas fa-file-pdf"></i>
              <span>{{ Helpers::neat($sr->title) }}</span>
            </a>
          @endforeach
        @endif
      </div>
      <a href="#assignments" class="menu list-group-item list-group-item-action" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="assignments">
        <i class="fas fa-file-alt"></i>
        <span>Lab Assignment</span>
      </a>
      <div id="assignments" class="collapse">
        @if ($files)
          @foreach ($files as $file)
            <a href="{{ $file->class_directory }}" target="_blank" class="menu-accordion list-group-item list-group-item-action">
              <i class="fas fa-file-pdf"></i>
              <span>{{ Helpers::neat($file->title) }}</span>
            </a>
          @endforeach
        @endif
      </div>
    </div>
  </div>
</div>
