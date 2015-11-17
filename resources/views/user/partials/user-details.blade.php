
<div class="col-sm-offset-3">
  <h2>Your details</h2>  
</div>

@include('common.errors')
@include('common.success')

{!! Form::open(['route' => ['user.update', Auth::user()->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}
  <div class="form-group">
    {!! Form::label('name', 'Name', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
      {!! Form::text('name', Auth::user()->customer->name, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('email', 'Email', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
      {!! Form::email('email', Auth::user()->email, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('sex', 'Gender', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
      {!! Form::select('sex', [0 => 'Male', 1 => 'Female'], Auth::user()->sex, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('birthdate', 'Birthdate', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
      {!! Form::date('birthdate', Auth::user()->birthdate, ['class' => 'form-control']); !!}
    </div>
  </div>
  
  <div class="form-group">
    {!! Form::label('address', 'Address', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
      {!! Form::text('address', Auth::user()->customer->address, ['class' => 'form-control']); !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('phone_number', 'Phone number', ['class' => 'control-label col-sm-3']) !!}
    <div class="col-sm-6">
      {!! Form::text('phone_number', Auth::user()->customer->phone_number, ['class' => 'form-control']); !!}
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-6">
      {!! Form::submit('Save', ['class' => 'btn btn-default pull-right']) !!}
    </div>
  </div>
{!! Form::close() !!}