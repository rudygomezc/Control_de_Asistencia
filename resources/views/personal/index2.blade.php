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
            
                    <table class="table table-striped">
                        <thead class="thead-default">
                            <tr>
                                <th>N°</th>
                                <th>IdPer.</th>
                                <th>IdGrupo</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>DNI</th>
                                <th>Telefono</th>
                                <th>Direccion</th>
                                <th>E-mail</th>
                                <th style="width:160px;">Opciones </th>
                            </tr>
                        </thead>
                              
                        </tbody>
                    </table>
                    <a class="btn btn-success btn-block" href="{{ url('personal/crud') }}"> Agregar Nuevo Empleado</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
