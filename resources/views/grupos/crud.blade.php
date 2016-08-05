@extends('layouts.app2')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading"> <h4> <center> {{ is_object($model) ? $model->nombre : 'Formulario Nuevo Grupo'}} </center> </h4> </div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('grupos/crud') }}">
                    {{ csrf_field() }}
                    <table class="table table-striped" width="400" >
                        <input type="hidden" name="id" value="{{ is_object($model) ? $model->id_personal_grupos : 0}}">
                        <tr >
                            <td align="right" ><label>Id Horario: </label></td>
                            <td>
                                <select name="idgr" id="idgr" class="form-control" >
                                    @forelse($model2 as $m)
                                        <option value="{{ $m->id_horario }}">{{ $m->descripcion." || ".$m->hora_entrada." || ".$m->hora_salida }} </option>
                                    @empty
                                        -- No se han encontrado datos --
                                    @endforelse
                                </select>
                            </td>
                        </tr>
                        <tr >
                            <td align="right"><label>Nombre: </label></td>
                            <td><input class="form-control" type="text" name="nomb" id="nomb" value="{{ is_object($model) ? $model->nombre : ''}}"  /></td>
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
