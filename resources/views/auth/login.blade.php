@extends('layouts.master')

@section('title')
  Login
@endsection

@section('content')
  <div class="col-sm-8 col-sm-offset-3 top-buffer">
    <div class="col-sm-offset-2">
      <h2>Login</h2>
    </div>   

    {!! Form::open(['url' => 'login', 'method' => 'post', 'class' => 'form-horizontal']) !!}

      <div class="form-group">
        <label for="email" class="control-label col-sm-2">Email</label>
        <div class="col-sm-4">
          <input type="email" name="email" value="{{ old('email') }}" id="email" class="form-control">
        </div>
      </div>

      <div class="form-group center-block">
        <label for="password" class="control-label col-sm-2">Password</label>
        <div class="col-sm-4">
          <input type="password" name="password" id="password" class="form-control">
        </div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <div class="checkbox">
            <label>
              <input type="checkbox" name="remember"> Remember Me
            </label>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-4">
          <button type="submit" class="btn btn-default pull-right">Login</button>
        </div>
      </div>

    {!! Form::close() !!}

    <div class="col-sm-offset-2 col-sm-4">
      @include('common.errors')  
    </div>
  </div>
@endsection