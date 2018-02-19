 <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="{{ asset('materialize/css/materialize.min.css') }}"  media="screen,projection"/>
      <link rel="stylesheet" href="{{ asset('css/sizing.css') }}">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      @stack('style')
    </head>
    <body>

  <nav>
    <div class="container">
      <div class="nav-wrapper">
        <a href="{{ route('index') }}" class="brand-logo center">Contact App</a>

        {{-- burger menu for smaller device --}}
        <a href="#" data-activates="mobile-nav" class="button-collapse"><i class="material-icons">menu</i></a>

        {{-- for desktop and laptop navigation --}}
        <ul class="left hide-on-med-and-down">
          <li><a href="#">Contacts</a></li>
          <li><a href="#">Statuses</a></li>
          <li class="active"><a href="{{ route('create') }}">create</a></li>
        </ul>
        <ul class="right hide-on-med-and-down">
          <li><a href="#">Login</a></li>
          <li><a class="dropdown-button" href="#!" data-activates="dropdown_user">UserName<i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>

      {{-- for mobile navigation --}}
        <ul class="side-nav" id="mobile-nav">
          <li><a href="#">Contacts</a></li>
          <li><a href="#">Statuses</a></li>
          <li class="active"><a href="#">create</a></li>
          <li><a href="#">Login</a></li>
          <li><a class="dropdown-button" href="#!" data-activates="dropdown_user">UserName<i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>

      </div>
    </div>
  </nav>
  <nav>
    <div class="container">
      <div class="nav-wrapper">
        <form>
          <div class="input-field">
            <input id="search" type="search" required>
            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
            <i class="material-icons">close</i>
          </div>
        </form>
    </div>
    </div>
  </nav>
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
    </body>
  </html>