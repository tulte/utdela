@extends('layouts.master')

@section('title', 'Benutzer')
@section('content')

@if ($errors->has())
    <div class="alert alert-warning">
        @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@if (isset($user))
<form action="{{route('user.update',[$user->id])}}" method="POST" autocomplete="off">
@else
<form action="{{route('user.save')}}" method="POST" autocomplete="off">
@endif
    {!! csrf_field() !!}
    <div class="form-group">
        <label for="name">Name</label>
        {!! Form::text('name', isset($user) ? $user->name : null , ['class' => 'form-control', 'placeholder' => 'Name']) !!}
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        {!! Form::email('email', isset($user) ? $user->email : null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
    </div>
    <div class="form-group">
        <label for="password">Passwort</label>
        {!! Form::text('password', null, ['class' => 'form-control', 'placeholder' => 'Password']) !!}
        <label for="password">Passwort wiederholen</label>
        {!! Form::text('password_confirmation', null, ['class' => 'form-control', 'placeholder' => 'Password']) !!}
    </div>
    <div class="form-group">
        <label for="group">Gruppe</label>
        {!! Form::select('group', $groups, isset($user->group_id) ? $user->group_id : null, ['class' => 'form-control', 'placeholder' => 'Gruppe']) !!}
    </div>
    <button type="submit" class="btn btn-primary">Speichern</button>
    <a href="{{route('user.index')}}" class="btn btn-default">Abbrechen</a>
</form>

@endsection
