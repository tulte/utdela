@extends('layouts.master')

@section('title', 'Dateien')
@section('content')

<script type="text/javascript">

$(function() {
    $('#userfile-table').DataTable({
        "bInfo": false,
        "bLengthChange": false,
        "ordering": false,
        "info":     false
    });
});

</script>


<table id="userfile-table" class="display" cellspacing="0">
    <thead>
        <tr>
            <th>Name</th>
            <th>Erstellt</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($files as $file)
            <tr>
                <td>{{$file->name}}</td>
                <td>{{$file->created_at}}</td>
                <td style="text-align: right;"><a href="#" class="btn btn-default glyphicon glyphicon-download-alt"></a></td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
