@extends('layouts.master')

@section('title', 'Hochladen')
@section('content')

@if (isset($errors) && $errors->has())
    <div class="alert alert-warning">
        @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@if (isset($infos) && $infos->has())
    <div class="alert alert-info">
        @foreach($infos->all() as $info)
        <p>{{ $info }}</p>
        @endforeach
    </div>
@endif

      <form method="POST" action="/upload" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div style="position:relative;">
            <a class="btn btn-default glyphicon glyphicon-file" href="javascript:;">
                <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
            </a>
            &nbsp;
            <span class='label label-info' id="upload-file-info"></span>
        </div>
        {!! Form::select('user',$users,null,array('class' => 'form-control', 'style' => 'margin-top:10px;')) !!}
        <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:10px;">Hochladen</button>
      </form>

@endsection
