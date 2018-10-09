<!-- Modal Register New Class -->
<div class="modal fade" id="register_new_class" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Register New Class</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ action('AdminController@register_new_class') }}">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="col-auto">
          <label>Please enter the class name</label>
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text">Class Name</div>
            </div>
            <input name="class" oninput="this.value = this.value.toUpperCase()" type="text" class="form-control" placeholder="EE241E8B">
          </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Register</button>
        </div>
      </form>
    </div>
  </div>
</div>
