<div class="modal fade" id="rental-edit-modal" tabindex="-1" role="dialog" aria-labelledby="rental-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="rental">Rental</h4>
      </div>
      <div class="modal-body">
        @include('admin.partials.forms.rental-edit-form')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Discard</button>
        <button type="button" class="btn btn-primary" id="edit-rental-modal-submit">Save changes</button>
      </div>
    </div>
  </div>
</div>