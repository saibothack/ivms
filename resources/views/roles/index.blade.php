{{-- \resources\views\roles\index.blade.php --}}
@extends('layouts.app')

@section('title', '| Roles')

@section('content')

<h1><i class="fa fa-key"></i> Roles

    
    <a href="{{ URL::to('roles/create') }}" class="btn btn-success pull-right">Agregar Rol</a>
</h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-sm">
            <thead>
                <tr class="d-flex">
                    <th class="col-2">Rol</th>
                    <th class="col-8">Permisos</th>
                    <th class="col-2">Operaciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($roles as $role)
                <tr class="d-flex">

                    <td class="col-2">{{ $role->name }}</td>

                    <td class="col-8">{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                    <td class="col-2">
                        <a href="{{ URL::to('roles/'.$role->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]) !!}
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
    
    {{ $roles->links() }}


@endsection