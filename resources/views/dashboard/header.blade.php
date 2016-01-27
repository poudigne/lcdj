<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('dashboard::home') }}">Le Coin du Jeu</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="{{{ (Request::route()->getName() == 'suggest' ? 'active' : '') }}}"><a href="{{ route('dashboard::create_product') }}">Products <span class="sr-only">(current)</span></a></li>
        <li class="{{{ (Request::route()->getName() == 'musics' ? 'active' : '') }}}"><a href="{{ route('dashboard::create_category') }}">News</a></li>
        <li class="{{{ (Request::route()->getName() == 'musics' ? 'active' : '') }}}"><a href="{{ route('dashboard::home') }}">Events</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          @if (Auth::check())  
            {{ isset(Auth::user()->username) ? Auth::user()->username : Auth::user()->email }}
            <span class="caret"></span>
            <ul class="dropdown-menu">
              <li><a href="{{ route('logout') }}" id="user-logout">Log out</a></li>
            </ul>
          @else
            Log in
          @endif
          </a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>