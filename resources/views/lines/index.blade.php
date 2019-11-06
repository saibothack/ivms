{{-- \resources\views\roles\index.blade.php --}}
@extends('layouts.app')

@section('title', '| Lineas')

@section('content')

<h1><i class="fa fa-key"></i> Lineas

    
    <a href="{{ URL::to('lines/create') }}" class="btn btn-success pull-right">Agregar Linea</a>
</h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-sm">
            <thead>
                <tr class="d-flex">
                    <th class="col-10">Linea</th>
                    <th class="col-2">Operaciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($lines as $line)
                <tr class="d-flex">

                    <td class="col-10">{{ $line->name }}</td>
                    <td class="col-2">
                        <a href="{{ URL::to('lines/'.$line->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['lines.destroy', $line->id] ]) !!}
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
    
    {{ $lines->links() }}


@endsection