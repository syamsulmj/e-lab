<!-- Modal StW -->
<div class="modal fade" id="send2whatsapp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Sending to Whatsapp</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ action('ReportController@send2whatsapp') }}">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="col-auto">
          <label>Please enter your lecturer phone number</label>
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text">+60</div>
              </div>
              <input name="phone-number" type="number" class="form-control" placeholder="123456789">
              <input hidden type="text" name="current-url" value="{{ url()->current() }}">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Send</button>
        </div>
      </form>
    </div>
  </div>
</div>
