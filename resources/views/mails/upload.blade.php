<html>
    <body>
    <p>
    Hallo {{$user->name}},
    </p>
    <p>
    eine neue Datei steht für Sie bereit:<br><br>
    <a href="{{route('user.download', ['id' => $file->id])}}">{{$file->name}}</a>
    </p>
    <p>
    Mit freundlichen Grüßen<br>
    <br>
    Tobias Müller
    </p>
    <img src="<?php echo $message->embed(public_path('/images/logo.png')); ?>">
    </body>
</html>
