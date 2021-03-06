<div class="modal fade" id="loginModal" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header" style="padding:35px 50px;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <img src="/images/img/mkdir_logo.png"
      style="width:100%;"/>
    </div>

    <div class="modal-body" style="padding:40px 50px;">
      {!! Form::open(['url' => 'login', 'method' => 'post', 'class' => 'form-horizontal' ,'role' => 'form']) !!}

        <div class="form-group">
          <label for="email"><span class="glyphicon glyphicon-user"></span> Email</label>
          <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email">
        </div>

        <div class="form-group">
          <label for="password"><span class="glyphicon glyphicon-lock"></span> Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
        </div>

        <div class="checkbox">
          <label><input type="checkbox" checked>Remember me</label>
        </div>
          <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
      {!! Form::close() !!}
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
        <span class="glyphicon glyphicon-remove"></span> Cancel
      </button>
      <p>Not a member? <a href="{{ url('register') }}">Sign Up</a></p>

    </div>

  </div>

  </div>
  </div>

  <div>
      @include('common.errors')
  </div>
