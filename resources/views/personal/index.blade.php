@extends('layouts.app2')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-16 col-md-offset-0">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>
                        <center>
                            Lista de Personal
                        </center>
                    </h4>
                </div>
                
                <div class="panel-body">
                    
                    <div class="row">
                        <p class="text-right">
                        
                        <div class="col-lg-3">
                            <?php $id=0; ?>
                            <a class="btn btn-primary " href="crud/{{ $id }}">
                                <i class="fa fa-edit"></i> Agregar Nuevo Personal
                            </a>
                        </div>
                        
                        <div class="col-lg-5">
                            
                        </div>
                        
                         <form method="GET" action="{{ url('personal/buscar') }}">
                            {{ csrf_field() }}
                            <div class="col-lg-4" align="right">
                                <div class="input-group">
                                <input type="text" class="form-control" placeholder="Ingrese el nombre del personal" id="busc" name="busc" >
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary" type="button">
                                        <i class="fa fa-search"></i>
                                        Buscar
                                    </button>
                                </span>
                                </div>
                            </div>
                        </form>
                        </p>
                    </div>
                        
                    <table class="table table-striped">
                        <thead class="thead-default">
                            <tr>
                                <th>N°</th>
                                <th>IdPer.</th>
                                <th>Grupo</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>DNI</th>
                                <th>Telefono</th>
                                <th>Direccion</th>
                                <th>E-mail</th>
                                <th style="width:160px;">Opciones </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $var=1; ?>
                            @forelse($model2 as $m)
                                <tr>
                                    <td>{{$var++}}</td>
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
                        </tbody>
                    </table>
                    <div align="right">
                        {!! $model2->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
