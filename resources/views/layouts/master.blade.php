<html>
    <head>
        <title>Utdela - @yield('title')</title>
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
    </head>
    <body>

    @if (Auth::guest())
        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
              </button>
              <a class="navbar-brand" href="{{url('/')}}">Utdela</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
               <ul class="nav navbar-nav navbar-right">
                <li class="pull-right"><a href="{{route('login.index')}}">Login</a></li>
                </ul>
            </div>
          </div>
        </nav>
      @else
        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
              </button>
              <a class="navbar-brand" href="{{url('/')}}">Utdela</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              @if (Auth::user()->group->name == 'admin')
              <ul class="nav navbar-nav">
                <li><a href="{{route('upload.index')}}">Hochladen</a></li>
                <li><a href="{{route('user.index')}}">Benutzer</a></li>
              </ul>
              @else
              <ul class="nav navbar-nav">
                <li><a href="{{route('user.files',['id' => Auth::user()->id])}}">Dateien</a></li>
              </ul>
              @endif
               <ul class="nav navbar-nav navbar-right">
                <li class="pull-right"><a href="{{route('logout')}}">Logout</a></li>
                </ul>
            </div>
          </div>
        </nav>
      @endif

        <div class="container" style="margin-top:80px;" role="main">
            @yield('content')
        </div>
    </body>
</html>
