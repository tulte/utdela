@extends('layouts.clean')

@section('title', 'Login')
@section('content')
        @if (Session::has('message'))
            <div class="alert alert-warning">
                <p>{{ Session::get('message') }}</p>
            </div>
        @endif
      <form class="form-signin" method="POST" action="/login">
        {!! csrf_field() !!}
        <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="Password" style="margin-top:10px;" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:15px;">Login</button>
      </form>



@endsection
