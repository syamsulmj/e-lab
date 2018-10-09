<div class="home container-fluid">
  <div class="user-details-div">
    <div class="user-details">
      <div class="user-image">
        <img src="{{ asset('images/default-profile-picture.jpg') }}" alt="">
      </div>
      <div style="padding: 1em;"></div>
      <div class="user-info">
        <div class="name">
          {{ Helpers::neat($admin->name) }}
        </div>
        <div class="role" style="margin-top: -15px; margin-bottom: 15px;">
          {{ Helpers::neat($admin->role) }}
        </div>
        <div class="matrix-number">
          {{ $admin->matrix_number }}
        </div>
      </div>
    </div>
  </div>
  <hr style="margin-left: -15px; margin-right: -15px; margin-top: 0; margin-bottom: 0; border-top: 2px solid #ffffff;">
  <div class="content-div">
    <div class="list-group content">
      <a href="#" class="menu list-group-item list-group-item-action">
        <i class="fas fa-user-circle"></i>
        <span>My Profile</span>
      </a>
      <a href="{{ action('AdminController@create_account') }}" class="menu list-group-item list-group-item-action">
        <i class="fas fa-file-alt"></i>
        <span>Add New Account</span>
      </a>
    </div>
  </div>
</div>
