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

        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="{{url('/')}}">Utdela</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="{{route('user.index')}}">Benutzer</a></li>
                <li><a href="{{route('upload.index')}}">Hochladen</a></li>
                <!--
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
                -->
              </ul>
               <ul class="nav navbar-nav navbar-right">
                <li class="pull-right"><a href="{{route('logout')}}">Logout</a></li>
                </ul>
            </div>
          </div>
        </nav>

        <div class="container" style="margin-top:80px;" role="main">
            @yield('content')
        </div>
    </body>
</html>
