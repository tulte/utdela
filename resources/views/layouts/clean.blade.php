<html>
    <head>
        <title>Utdela - @yield('title')</title>
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}">
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
