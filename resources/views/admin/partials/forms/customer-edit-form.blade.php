{!! Form::open(['route' => 'customer.update', 'method' => 'put', 'id' => 'customer-edit-form','class' => 'form-horizontal']) !!}
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

  <div class="form-group">
    {!! Form::label('points', 'Points', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-4">
      {!! Form::number('points', null, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox" value="admin" name="admin" id="admin"> Admin
        </label>
      </div>
    </div>
  </div>
{!! Form::close()!!}