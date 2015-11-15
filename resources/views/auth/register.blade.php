@extends('layouts.master')

@section('title')
  Register
@endsection

@section('content')
  <div class="col-sm-8 col-sm-offset-3 top-buffer">
    <div class="col-sm-offset-2">
      <h2>Register</h2>
    </div>

    {!! Form::open(['url' => '/register', 'method' => 'post', 'class' => 'form-horizontal']) !!}
      <div class="form-group">
        {!! Form::label('name', 'Name', ['class' => 'control-label col-sm-2']) !!}
        <div class="col-sm-4">
          {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('email', 'Email', ['class' => 'control-label col-sm-2']) !!}
        <div class="col-sm-4">
          {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('password', 'Password', ['class' => 'control-label col-sm-2']) !!}
        <div class="col-sm-4">
          {!! Form::password('password', ['class' => "form-control"]) !!}
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'control-label col-sm-2']) !!}
        <div class="col-sm-4">
          {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
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
          {!! Form::date('birthdate', \Carbon\Carbon::now(), ['class' => 'form-control']); !!}
        </div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-4">
          {!! Form::submit('Register', ['class' => 'btn btn-default pull-right']) !!}
        </div>
      </div>
    {!! Form::close() !!}

    <div class="col-sm-offset-2 col-sm-4">
      @include('common.errors')
    </div>
  </div>
@endsection