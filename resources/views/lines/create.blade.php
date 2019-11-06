@extends('layouts.app')

@section('title', '| Agregar Linea')

@section('content')

<h1><i class='fa fa-key'></i> Nueva Linea</h1>
<hr>

{{ Form::open(array('url' => 'lines')) }}

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
        {{ Form::submit('Agregar', array('class' => 'btn btn-primary')) }}
    </div>
</div>

{{ Form::close() }}

@endsection