<div class="modal fade" id="dvd-edit-modal" tabindex="-1" role="dialog" aria-labelledby="dvd-edit-label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="dvd-edit-label">Edit dvd</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          @include('DVD.edit-dvd-form')  
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Discard</button>
        <button type="button" class="btn btn-primary" id="edit-dvd-modal-submit">Save changes</button>
      </div>
    </div>
  </div>
</div>