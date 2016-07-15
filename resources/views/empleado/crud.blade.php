@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> <h3> <center> {{ is_object($model) ? $model->name : 'Formulario Nuevo Empleado'}} </center> </h3> </div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('asistencia/crud') }}">
                    {{ csrf_field() }}
                    <table class="table table-striped">
                        <input type="hidden" name="id" value="{{ is_object($model) ? $model->id : 0}}">
                        <tr >
                            <td><label>Nombre: </label></td>
                            <td><input class="form-control" type="text" name="nombre" id="nombre" value="{{ is_object($model) ? $model->name : ''}}" /></td>
                        </tr>
                        <tr >
                            <td><label>E-Mail</label></td>
                            <td><input class="form-control" type="text" name="email" id="email" value="{{ is_object($model) ? $model->email : ''}}"  /></td>
                        </tr>
                        <tr >
                            <td><label>Direccion</label></td>
                            <td><input class="form-control" type="text" name="direccion"  value="{{ is_object($model) ? $model->direccion : ''}}" /></td>
                        </tr>
                        <tr >
                            <td><label>Telefono: </label></td>
                            <td><input class="form-control" type="text" name="telefono"  value="{{ is_object($model) ? $model->telefono : ''}}" /></td>
                        </tr>
                        <tr >
                            <td><label>Profesion: </label></td>
                            <td><input class="form-control" type="text" name="profesion"  value="{{ is_object($model) ? $model->profesion : ''}}" /></td>
                        </tr>
                        <tr >
                            <td><label>Habilitado: </label></td>
                            <td>

                                <select class="form-group" name="habilitado">
                                    <option  value="{{ is_object($model) ? $model->name : 1}}" >Si</option>
                                    <option  value="{{ is_object($model) ? $model->name : 2}}" >No</option>
                                </select>

                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="btn btn-primary tbn-lg btn-block">
                                    Guardar
                                </button>
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
