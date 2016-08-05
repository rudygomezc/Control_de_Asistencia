@extends('layouts.app2')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4><center>Lista de Grupos</center></h4></div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id_Grupo</th>
                                <th>Id_Horario</th>
                                <th>Nombre</th>
                                <th style="width:160px;">Opciones </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($model as $m)
                                <tr>
                                    <td>{{ $m->id_personal_grupos }}</td>
                                    <td>{{ $m->id_horario }}</td>
                                    <td>
                                        <a href="ver/{{ $m->id_personal_grupos }}">
                                            {{ $m->nombreg }}
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-xs btn-default" href="crud/{{$m->id_personal_grupos}}">
                                            <i class="fa fa-edit"></i> Editar
                                        </a>
                                        <a class="btn btn-xs btn-danger" href="eliminar/{{$m->id_personal_grupos}}">
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
                    <a class="btn btn-primary btn-lg btn-block" href="{{ url('grupos/crud') }}"> Agregar Nuevo Grupo </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
