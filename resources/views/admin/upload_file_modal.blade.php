<!-- Modal Upload Files -->
<div class="modal fade" id="{{ 'modal-'.$rc->class }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="color: #000000;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Upload new file into class {{ $rc->class.'?' }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('upload_file', ['class_name' => $rc->class]) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="custom-file" id="customFile">
            <input type="file" class="custom-file-input" id="inputFile" name="upload-file">
            <label id="customFileLabel" class="custom-file-label form-control-file" for="customFile">Choose file</label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-outline-primary">Upload</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $('.custom-file-input').on('change',function(){
    $('#customFileLabel').text($(this).val().split(/(\\|\/)/g).pop());
  })
</script>
