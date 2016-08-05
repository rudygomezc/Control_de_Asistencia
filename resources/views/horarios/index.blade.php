@extends('layouts.app2')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-16 col-md-offset-0">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4><center>Lista de Horarios</center></h4></div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id_Horario</th>
                                <th>Descripcion</th>
                                <th>H. Entrada</th>
                                <th>H. Salida</th>
                                <th>H. Salida Almuerzo</th>
                                <th>H. Entrada Almuerzo</th>
                                
                                <th style="width:160px;">Opciones </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($model as $m)
                                <tr>
                                    <td>{{ $m->id_horario }}</td>
                                    <td>{{ $m->descripcion }}</td>
                                    <td>{{ $m->hora_entrada }}</td>
                                    <td>{{ $m->hora_salida }}</td>
                                    <td>{{ $m->hora_salida_almuerzo }}</td>
                                    <td>{{ $m->hora_entrada_almuerzo }}</td>
                                    
                                    <td>
                                        <a class="btn btn-xs btn-default" href="crud/{{$m->id_horario}}">
                                            <i class="fa fa-edit"></i> Editar
                                        </a>
                                        <a class="btn btn-xs btn-danger" href="eliminar/{{$m->id_horario}}">
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
                    <a class="btn btn-success btn-lg btn-block" href="{{ url('horarios/crud') }}"> Agregar Nuevo Horario </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
