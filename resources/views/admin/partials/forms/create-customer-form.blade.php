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