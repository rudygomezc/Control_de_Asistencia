@extends('layouts.app2')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading"> <h4> <center> {{ is_object($model) ? ".::Editar::. ".$model->descripcion : 'Formulario Nuevo Horario'}} </center> </h4> </div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('horarios/crud') }}">
                    {{ csrf_field() }}
                    <table class="table table-striped" width="400" >
                        <input type="hidden" name="id" value="{{ is_object($model) ? $model->id_horario : 0}}">
                        <tr >
                            <td align="right"><label>Descripcion: </label></td>
                            <td><input class="form-control" type="text" name="desc" id="desc" value="{{ is_object($model) ? $model->descripcion : ''}}"  /></td>
                        </tr>
                        <tr >
                            <td align="right"><label>Hora Entrada: </label></td>
                            <td><input class="form-control" type="text" name="hent" id="hent" value="{{ is_object($model) ? $model->hora_entrada : ''}}" /></td>
                        </tr>
                        <tr >
                            <td align="right"><label>Hora Salida: </label></td>
                            <td><input class="form-control" type="text" name="hsal" id="hsal" value="{{ is_object($model) ? $model->hora_salida : ''}}" /></td>
                        </tr>
                        <tr >
                            <td align="right"><label>Hora Salida Almuerzo: </label></td>
                            <td><input class="form-control" type="text" name="hsaa" id="hsaa"  value="{{ is_object($model) ? $model->hora_salida_almuerzo : ''}}" /></td>
                        </tr>
                        <tr >
                            <td align="right"><label>Hora Entrada Almuerzo: </label></td>
                            <td><input class="form-control" type="text" name="heal" id="heal" value="{{ is_object($model) ? $model->hora_entrada_almuerzo : ''}}" /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="btn btn-success tbn-lg btn-block">
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
