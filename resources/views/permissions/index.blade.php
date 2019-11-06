{{-- \resources\views\permissions\index.blade.php --}}
@extends('layouts.app')

@section('title', '| Permissions')

@section('content')

<h1>
    <i class="fa fa-key"></i>Permisos Disponibles
    <a href="{{ URL::to('permissions/create') }}" class="btn btn-success pull-right">Agregar Permisos</a>
</h1>

<hr>
<div class="table-responsive">
    <table class="table table-bordered table-striped table-sm">

        <thead>
            <tr>
                <th>Permisos</th>
                <th>Aciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permissions as $permission)
            <tr>
                <td>{{ $permission->name }}</td> 
                <td class="col-2">
                    <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{ $permissions->links() }}

@endsection