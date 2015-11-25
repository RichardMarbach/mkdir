<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
        data-target="#main-nav-collapse" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a class="navbar-brand" href="{{ url('/') }}">
        <span class="glyphicon glyphicon-home"aria-hidden="true"></span>
      </a>
    </div>
    <div class="collapse navbar-collapse" id="main-nav-collapse">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Genre
            <span class="caret"></span>
          </a>

          <ul class="dropdown-menu">
            @foreach ($genres as $genre)
              <li><a href="#">{{ $genre->genre }}</a></li>
            @endforeach
          </ul>
        </li>
      </ul>

      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">
          <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
        </button>
      </form>

      <ul class="nav navbar-nav navbar-right">
        @if (Auth::check())
          <li>
            <a href="#">
              <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
            </a>
          </li>
        @endif

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            @if (Auth::check())
              <li><a href="{{ route('user.dashboard') }}">My Dashboard</a></li>
              @if (Auth::user()->isAdmin())
                <li><a href="{{ route('admin.dashboard') }}">Admin pannel</a></li>
              @endif
              <li><a href="{{ url('/logout')}}">Logout</a></li>
            @else
              <li><a data-target="#loginModal" data-toggle="modal">Sign in</a></li>
              <li><a href="{{ url('/register') }}">Join us</a></li>
            @endif
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

@include ('auth.login-modal')
