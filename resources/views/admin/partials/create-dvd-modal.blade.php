<div class="modal fade" id="create-dvd-modal" tabindex="-1" role="dialog" aria-labelledby="create-dvd-label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="create-dvd-label">Add dvd</h4>
      </div>
      <div class="modal-body">
        @include('DVD.create-form')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Discard</button>
        <button type="button" class="btn btn-primary" id="create-dvd-submit">Create</button>
      </div>
    </div>
  </div>
</div>