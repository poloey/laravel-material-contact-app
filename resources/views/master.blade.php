 <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="{{ asset('materialize/css/materialize.min.css') }}"  media="screen,projection"/>
      <link rel="stylesheet" href="{{ asset('css/sizing.css') }}">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link rel='stylesheet' href='{{ asset('css/style.css') }}'/>
      @stack('style')
    </head>
    <body>

  <nav>
    <div class="container">
      <div class="nav-wrapper">
        <a href="{{ route('contacts.index') }}" class="brand-logo center"><i class="material-icons">perm_contact_calendar</i> Contact App <br><span style="font-size: 12px; color: #eee;"> track every last status </span> </a>

        {{-- burger menu for smaller device --}}
        <a href="#" data-activates="mobile-nav" class="button-collapse"><i class="material-icons">menu</i></a>

        {{-- for desktop and laptop navigation --}}
        <ul class="left hide-on-med-and-down">
          <li><a href="{{ route('contacts.create') }}">Add a contact</a></li>
        </ul>
        <ul class="right hide-on-med-and-down">
          <li><a> You are login as {{auth()->user()->name}} </a></li>
          <li>
            <a onclick="event.preventDefault(); document.querySelector('#logout_form').submit();">Logout</a>
          </li>
        </ul>

      {{-- for mobile navigation --}}
        <ul class="side-nav" id="mobile-nav">
          <li><a href="{{ route('contacts.create') }}">Add a contact</a></li>
          <li><a> You are login as {{auth()->user()->name}} </a></li>
          <li>
            <a onclick="event.preventDefault(); document.querySelector('#logout_form').submit();">Logout</a>
          </li>
        </ul>

      </div>
    </div>
  </nav>
  <nav>
    <div class="container">
      <div class="nav-wrapper">
        <form action="{{ route('contacts.index') }}">
          <div class="input-field">
            <input id="search" type="search" name="query" required>
            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
            <i class="material-icons">close</i>
          </div>
        </form>
    </div>
    </div>
  </nav>
  <form id="logout_form" class="hidden" method="post" action='{{ route('logout') }}' style="display: none;">
    @csrf
  </form>
  <ul id="dropdown_user" class="dropdown-content">
    <li><a href="#!">Logout</a></li>
  </ul>
      @yield('content')
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="{{ asset('materialize/js/materialize.min.js') }}"></script>
<script>
  $(".button-collapse").sideNav();
</script>
@stack('script')
    </body>
  </html>