 <nav class="navbar navbar-fixed-top">
  <div class="container">
  
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/screens">IDS</a>
    </div>

    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              Surfaces <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="/screens">View Surfaces</a></li>
              <li><a href="/screens/create">Create Surface</a></li>
              <li role="separator" class="divider"></li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              Content <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="/content">View Content</a></li>
              <li><a href="/content/create">Create Content</a></li>
              <li role="separator" class="divider"></li>
            </ul>
          </li>
     </ul>
     
  @if (Auth::check())
     <ul class="nav navbar-nav navbar-right">
      <li><p class="navbar-text">Hello {{ Auth::user()->name }} ({{ Auth::user()->email }})</p></li>
      <li>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
           Logout <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
      </li>
    </ul>
  @endif  

  </div><!--/.nav-collapse -->
</div>
</nav>