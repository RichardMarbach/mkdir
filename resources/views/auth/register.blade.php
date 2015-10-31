@extends('layouts.master')

@section('title')
  Register
@endsection

@section('content')
@include('common.errors')

{!! Form::open(['url' => '/register', 'method' => 'post']) !!}
  <div>
    {!! Form::label('email', 'Email') !!}
    {!! Form::email('email') !!}
  </div>

  <div>
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password') !!}
  </div>

  <div>
    {!! Form::label('password_confirmation', 'Confirm Password') !!}
    {!! Form::password('password_confirmation') !!}
  </div>

  <div>
    {!! Form::label('sex', 'Gender') !!}
    {!! Form::select('sex', [0 => 'Male', 1 => 'Female']) !!}
  </div>

  <div>
    {!! Form::label('birthdate', 'Birthdate') !!}
    {!! Form::date('birthdate', \Carbon\Carbon::now()); !!}
  </div>

  <div>
    {!! Form::submit('Register') !!}
  </div>
{!! Form::close() !!}
@endsection