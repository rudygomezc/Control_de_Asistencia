@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Datos de Empleado:</div>
                    
                RUDY
                
                <div class="panel-body">
                    
                     @forelse($model as $m)
                                <tr>
                                    <td></td>
                                    <td>{{ $m->id_personal }}</td>
                                    <td>{{ $m->nombreg }}</td>
                                    <td>
                                        <a href="ver/{{ $m->id_personal }}">
                                            {{ $m->nombre }}
                                        </a>
                                    </td>
                                    <td>{{ $m->apellido }}</td>
                                    <td>{{ $m->dni }}</td>
                                    <td>{{ $m->telefono }}</td>
                                    <td>{{ $m->direccion }}</td>
                                    <td>{{ $m->email }}</td>
                                    <td>
                                        <a class="btn btn-xs btn-info" href="crud/{{$m->id_personal}}">
                                            <i class="fa fa-edit"></i> Editar
                                        </a>
                                        <a class="btn btn-xs btn-danger" href="eliminar/{{$m->id_personal}}">
                                            <i class="fa fa-trash"></i> Eliminar
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        -- No se han encontrado datos --
                                    </td>
                                </tr>
                            @endforelse

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
