@extends('layouts.app')

@section('title', '| Add Role')

@section('content')

<h1><i class='fa fa-key'></i> Nuevo Rol</h1>
<hr>

{{ Form::open(array('url' => 'roles')) }}

<div class="form-group">
    {{ Form::label('name', 'Nombre') }}
    {{ Form::text('name', null, array('class' => 'form-control')) }}
</div>

<h5><b>Asignar permisos</b></h5>

<div class='row'>
    @foreach ($permissions as $permission)
        <div class='col-md-3'>
            {{ Form::checkbox('permissions[]',  $permission->id ) }}
            {{ Form::label($permission->name, ucfirst($permission->name)) }}
        </div>
    @endforeach
</div>

<hr/>
<div class="row">
    <div class="col-md-1">
        <a href="{{ URL::to('roles/index') }}" class="btn btn-default">Regresar</a>
    </div>
    <div class="col-md-1">
        {{ Form::submit('Agregar', array('class' => 'btn btn-primary')) }}
    </div>
</div>

{{ Form::close() }}

@endsection