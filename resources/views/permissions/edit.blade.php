@extends('layouts.app')

@section('title', '| Edit Permission')

@section('content')

<h1><i class='fa fa-key'></i> Modificar {{$permission->name}}</h1>
<br>
{{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}
{{-- Form model binding to automatically populate our fields with permission data --}}

<div class="form-group">
    {{ Form::label('name', 'Nombre') }}
    {{ Form::text('name', null, array('class' => 'form-control')) }}
</div>

<hr/>
<div class="row">
    <div class="col-md-1">
        <a href="{{ URL::to('permissions/index') }}" class="btn btn-default">Regresar</a>
    </div>
    <div class="col-md-1">
        {{ Form::submit('Modificar', array('class' => 'btn btn-primary')) }}
    </div>
</div>

{{ Form::close() }}

@endsection