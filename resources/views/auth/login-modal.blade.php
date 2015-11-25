<div class="modal fade" id="loginModal" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header" style="padding:35px 50px;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <img src="images/img/mkdir_logo.png"
      style="width:100%;"/>
    </div>
    <div class="modal-body" style="padding:40px 50px;">
      <form role="form">
        <div class="form-group">
          <label for="usrname"><span class="glyphicon glyphicon-user"></span> Email</label>
          <input type="text" class="form-control" id="usrname" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="psw"><span class="glyphicon glyphicon-lock"></span> Password</label>
          <input type="password" class="form-control" id="psw" placeholder="Enter password">
        </div>
        <div class="checkbox">
          <label><input type="checkbox" value="" checked>Remember me</label>
        </div>
          <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
      </form>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
      <p>Not a member? <a href="register">Sign Up</a></p>

    </div>

  </div>

  </div>
  </div>

  <div>
      @include('common.errors')
  </div>