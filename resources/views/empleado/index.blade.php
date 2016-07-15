@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3><center>Lista de Empleados</center></h3></div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id.</th>
                                <th>Nombre</th>
                                <th>E-Mail</th>
                                <th>Direccion</th>
                                <th>Telefono</th>
                                <th>Profesion</th>
                                <th style="width:160px;">Opc.</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($model as $m)
                                <tr>
                                    <td>{{ $m->id }}</td>
                                    <td>
                                        <a href="ver/{{ $m->id }}">
                                            {{ $m->name }}
                                        </a>
                                    </td>
                                    <td>{{ $m->email }}</td>
                                    <td>{{ $m->direccion }}</td>
                                    <td>{{ $m->telefono }}</td>
                                    <td>{{ $m->profesion }}</td>
                                    <td>
                                        <a class="btn btn-xs btn-default" href="crud/{{$m->id}}">
                                            <i class="fa fa-edit"></i> Editar
                                        </a>
                                        <a class="btn btn-xs btn-danger" href="eliminar/{{$m->id}}">
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
                        </tbody>
                    </table>
                    <a class="btn btn-default btn-lg btn-block" href="{{ url('asistencia/crud') }}"> Agregar Nuevo Empleado</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
