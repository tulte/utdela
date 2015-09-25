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
        <label for="email" class="sr-only">Email address</label>
        <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
        <label for="password" class="sr-only">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="remember"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
      </form>



@endsection
