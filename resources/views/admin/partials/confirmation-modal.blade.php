<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="Confirm">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="delete-modal-label">Are you sure you?</h4>
      </div>
      <div class="modal-footer">
        {!! Form::open(['method' => 'delete', 'route' => 'customer.destroy', 'id' => 'delete-form']) !!}
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-default" id="confirm-delete">Delete</button>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>