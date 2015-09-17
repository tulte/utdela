@extends('layouts.master')

@section('title', 'Benutzer')
@section('content')

<script type="text/javascript">

$(function() {
    $('#user-table').DataTable({
        "bInfo": false,
        "bLengthChange": false,
        "ordering": false,
        "info":     false
    });
});

</script>

<a href="{{route('user.create')}}" class="btn btn-default">Neu</a>

<table id="user-table" class="display" cellspacing="0">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Erstellt</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
                <td><a href="{{route('user.edit', [$user->id])}}" class="btn btn-default">Edit</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
