@extends('layouts.app')

@section('title', '| Modificar linea')

@section('content')

<h1><i class='fa fa-key'></i> Modificar linea: {{$line->name}}</h1>
<hr>

{{ Form::model($line, array('route' => array('lines.update', $line->id), 'method' => 'PUT')) }}

<div class="form-group">
    {{ Form::label('name', 'Nombre') }}
    {{ Form::text('name', null, array('class' => 'form-control')) }}
</div>

<hr/>
<div class="row">
    <div class="col-md-1">
        <a href="{{ URL::to('lines/index') }}" class="btn btn-default">Regresar</a>
    </div>
    <div class="col-md-1">
        {{ Form::submit('Modificar', array('class' => 'btn btn-primary')) }}
    </div>
</div>

<br>

{{ Form::close() }}

@endsection