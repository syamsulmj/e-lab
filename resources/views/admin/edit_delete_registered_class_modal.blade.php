<!-- Modal Edit Registered Class -->
<div class="modal fade" id="{{ $rc->class }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="color: #000000;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit or Delete Class {{ $rc->class }}?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ route('update_class', ['matrix_number' => session('matrix_number'), 'class_name' => $rc->class]) }}">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="col-auto" style="text-align: left;">
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
          <a href="{{ route('delete_class', ['matrix_number' => session('matrix_number'), 'class_name' => $rc->class]) }}" onclick="event.preventDefault(); document.getElementById('delete-class-{{ $rc->class }}').submit();" class="btn btn-danger">Delete</a>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
      <form style="display: none;" id="delete-class-{{ $rc->class }}" action="{{ route('delete_class', ['matrix_number' => session('matrix_number'), 'class_name' => $rc->class]) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('delete') }}
      </form>
    </div>
  </div>
</div>
