<!-- Modal Change Password -->
<div class="modal fade" id="change-password" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="color: #000000;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div id="current-password-form" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Please enter your current password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input type="password" class="form-control" id="current-password" placeholder="Your current password">
          <div id="wrong-password-message" style="text-align: center; color: #f4001c; margin-top: 10px; display: none;">
            <span>Wrong Password!</span>
          </div>
        </div>
        <button type="button" onclick="CheckPassword()" class="btn btn-primary" name="button">Confirm</button>
      </div>
    </div>
    <div id="spinner" class="modal-content" style="background: transparent; border: none; display: none;">
      <div style="text-align: center; color: #77f8ff;">
        <i class="fas fa-spinner fa-spin" style="font-size: 5rem;"></i>
      </div>
    </div>
    <div id="new-password-form" class="modal-content" style="display: none;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Please enter your new password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ action('HomeController@student_password_update') }}" method="post">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="form-group" style="margin-top: 1rem;">
            <input class="form-control" type="password" name="new-password" placeholder="Your new password">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-outline-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  function CheckPassword() {
    $('#current-password-form').hide();
    $('#spinner').show();
    setTimeout(function(){
      if (pass == $('#current-password').val()) {
        console.log("success");
        $('#spinner').hide();
        $('#new-password-form').show();
      }
      else {
        console.log("failed");
        $('#spinner').hide();
        $('#current-password-form').show();
        $('#wrong-password-message').show();
      }
    }, 500);
    if (pass == $('#current-password').val()) {
      console.log("success");
    }
    else {
      console.log("failed");
    }
  }
</script>
