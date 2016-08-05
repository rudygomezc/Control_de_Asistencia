@extends('layouts.app2')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading"> <h4> <center> {{ is_object($model) ? "Modificar: ".$model->nombre : 'Formulario Nuevo Personal'}} </center> </h4> </div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('personal/crud') }}">
                    {{ csrf_field() }}  
                    <?php $var=$var+1; ?>
                    <table class="table table-striped" width="400" >
                        <input type="hidden" name="idid" id="idid" value="{{ is_object($model) ? $model->id_personal : 'PE000'.$var }}">
                        <input type="hidden" name="id" value="{{ is_object($model) ? $model->id_personal : 0 }}">
                         <tr >
                            <td align="right"><label>Id Personal: </label></td>
                            <td>
                                <div class="col-xs-4">
                                    <input size="6" class="form-control" disabled type="text" name="ide" id="ide" value="{{ is_object($model) ? $model->id_personal : 'PE000'.$var}}"  />
                                </div>
                             </td>
                        </tr>
                        <tr >
                            <td align="right" ><label>Id Personal Grupo: </label></td>
                            <td>
                                <div class="col-xs-4">
                                <select name="idgr" id="idgr" class="form-control" >
                                    @forelse($model2 as $m)
                                        <option value="{{ $m->id_personal_grupos }}">{{ $m->nombreg }} </option>
                                    @empty
                                        -- No se han encontrado datos --
                                    @endforelse
                                    </select></div>
                            </td>
                        <tr >
                            <td align="right"><label>Nombre: </label></td>
                            <td>
                                <div class="col-xs-6">
                                    <input class="form-control" type="text" name="nomb" id="nomb" value="{{ is_object($model) ? $model->nombre : ''}}"  />
                                
                                </div>        
                            </td>
                        </tr>
                        <tr >
                            <td align="right"><label>Apellido: </label></td>
                            <td>
                                <div class="col-xs-8">
                                    <input class="form-control" type="text" name="apel" id="apel" value="{{ is_object($model) ? $model->apellido : ''}}" />
                                </div>
                            </td>
                        </tr>
                        <tr >
                            <td align="right"><label>DNI: </label></td>
                            <td><div class="col-xs-6">
                                <input class="form-control" type="text" name="dni" id="dni" value="{{ is_object($model) ? $model->dni : ''}}" /></div></td>
                        </tr>
                        <tr >
                            <td align="right"><label>Telefono: </label></td>
                            <td><div class="col-xs-6">
                                <input class="form-control" type="text" name="tele" id="tele"  value="{{ is_object($model) ? $model->telefono : ''}}" /></div></td>
                        </tr>
                        <tr >
                            <td align="right"><label>Direccion: </label></td>
                            <td><div class="col-xs-8"><input class="form-control" type="text" name="dire" id=dire value="{{ is_object($model) ? $model->direccion : ''}}" /></div></td>
                        </tr>
                        <tr >
                            <td align="right"><label>E-Mail: </label></td>
                            <td><div class="col-xs-8"><input class="form-control" type="text" name="emai" id="emai" value="{{ is_object($model) ? $model->email : ''}}" /></div></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Guardar
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
