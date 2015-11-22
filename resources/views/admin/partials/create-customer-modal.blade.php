<div class="modal fade" id="create-customer" tabindex="-1" role="dialog" aria-labelledby="create-customer-label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="create-customer-label">Add customer</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['route' => 'customer.store', 'method' => 'post', 'id' => 'create-customer-form','class' => 'form-horizontal']) !!}
          <div class="form-group">
            {!! Form::label('name', 'Name', ['class' => 'control-label col-sm-2']) !!}
            <div class="col-sm-4">
              {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
          </div>

          <div class="form-group">
            {!! Form::label('address', 'Address', ['class' => 'control-label col-sm-2']) !!}
            <div class="col-sm-4">
              {!! Form::text('address', null, ['class' => 'form-control']) !!}
            </div>
          </div>

          <div class="form-group">
            {!! Form::label('phone_number', 'Phone', ['class' => 'control-label col-sm-2']) !!}
            <div class="col-sm-4">
              {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
            </div>
          </div>
        {!! Form::close()!!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Discard</button>
        <button type="button" class="btn btn-primary" id="#modal-submit">Create</button>
      </div>
    </div>
  </div>
</div>