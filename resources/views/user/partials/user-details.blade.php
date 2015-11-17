
{!! Form::open(['route' => ['user.update', $user->id, $user->customer->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}
  <div class="form-group">
    {!! Form::label('name', 'Name', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-4">
      {!! Form::text('name', $user->customer->name, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('email', 'Email', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-4">
      {!! Form::email('email', $user->email, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('sex', 'Gender', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-4">
      {!! Form::select('sex', [0 => 'Male', 1 => 'Female'], null, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('birthdate', 'Birthdate', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-4">
      {!! Form::date('birthdate', $user->birthdate, ['class' => 'form-control']); !!}
    </div>
  </div>
  
  <div class="form-group">
    {!! Form::label('address', 'Address', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-4">
      {!! Form::text('address', $user->customer->address, ['class' => 'form-control']); !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('phone_number', 'Tel.', ['class' => 'control-label col-sm-2']) !!}
    <div class="col-sm-4">
      {!! Form::text('phone_number', $user->customer->phone_number, ['class' => 'form-control']); !!}
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-4">
      {!! Form::submit('Save', ['class' => 'btn btn-default pull-right']) !!}
    </div>
  </div>
{!! Form::close() !!}