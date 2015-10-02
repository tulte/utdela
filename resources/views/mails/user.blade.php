<html>
    <body>
    <p>
    Hallo {{$user->name}},
    </p>
    <p>
    verwenden Sie bitte folgende Zugangsdaten für den Zugriff auf das
    <a href="{{url('/')}}">System.</a>
    </p>
    <p>
    Email: {{$user->email}}<br>
    Passwort: {{$user->password}}
    </p>
    <p>
    Mit freundlichen Grüßen<br>
    <br>
    Tobias Müller
    </p>
    <img src="<?php echo $message->embed(public_path('/images/logo.png')); ?>">
    </body>
</html>
