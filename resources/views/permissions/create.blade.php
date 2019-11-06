{{-- \resources\views\permissions\create.blade.php --}}
@extends('layouts.app')

@section('title', '| Create Permission')

@section('content')

<h1><i class='fa fa-key'></i> Agregar permisos</h1>
<br>

{{ Form::open(array('url' => 'permissions')) }}

<div class="form-group">
    {{ Form::label('name', 'Nombre') }}
    {{ Form::text('name', '', array('class' => 'form-control')) }}
</div>

<br>

@if(!$roles->isEmpty())
    <h4>Asignar roles al permiso</h4>

    @foreach ($roles as $role) 
        {{ Form::checkbox('roles[]',  $role->id) }}
        {{ Form::label($role->name, ucfirst($role->name)) }}<br>
    @endforeach
@endif

<hr/>
<div class="row">
    <div class="col-md-1">
        <a href="{{ URL::to('permissions/index') }}" class="btn btn-default">Regresar</a>
    </div>
    <div class="col-md-1">
        {{ Form::submit('Agregar', array('class' => 'btn btn-primary')) }}
    </div>
</div>

{{ Form::close() }}

@endsection