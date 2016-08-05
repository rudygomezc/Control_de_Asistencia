@extends('layouts.app2')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading" align="center">Datos de Personal:</div>
                <div class="panel-body" align="center">
                    
                    <form method="POST" action="{{ url('asistencia/crud3/') }}">
                        {{ csrf_field() }}
                                                
                        <?php                    
                            $hoy = date("Y-m-d");         
                            echo "<input type='hidden' id='fecha' name='fecha' value='$hoy'>";
                            $hoy = date(":i:s");
                            $hoy2 = date("H")-5;      
                            echo "<input type='hidden' id='hora' name='hora' value='$hoy2$hoy'>";
                        ?>
                    <div class="alert alert-success">
                    <table align="center" class="" bgcolor="#DAD9D9" >
                        @forelse($model as $m)
                            <input type="hidden" id="id" name="id" value="{{$m->id_personal}}"> 
                            <tr bgcolor="">
                                <td rowspan="4" align="center" width="200"> 
                                    <img src="../img/images.png" width="170" height="150">
                                </td>
                                <td width="400">
                                    <h1 class="page-header" align="center"> 
                                        {{ $m->id_personal }}<br> 
                                        {{ $m->nombre }}, {{ $m->apellido }}
                                    </h1></td>
                            </tr>
                            <tr  bgcolor="">
                                <td align="center">E-mail: {{ $m->email }}</td>
                            </tr>
                            <tr  bgcolor="">
                                <td align="center">Direccion: {{ $m->direccion }}</td>
                            </tr>
                            <tr  bgcolor="">
                                <td align="center">Telefono: {{ $m->telefono }}</td>
                            </tr>
                        
                            <tr>
                                <td align="center" width="400"><br>
                                    <label class="radio-inline"><input type="radio" checked name="optsubtipo" value="Del trabajo"> 
                                        Subtipo: Del Trabajo
                                    </label>
                                    <button type="submit" id="btnentrada" id="btnentrada" value="entrada" class="btn btn-primary tbn-lg btn-block">
                                        <i class="glyphicon glyphicon-arrow-down"></i>
                                        Marcar Entrada
                                    </button>
                                </td>
                                <td align="center"><br>
                                    <label class="radio-inline"><input type="radio" name="optsubtipo" value="Del almuerzo"> 
                                        Subtipo: Del Almuerzo
                                    </label>
                                    <button type="submit" id="btnsalida" name="btnsalida" value="salida" class="btn btn-danger tbn-lg btn-block">
                                        <i class="glyphicon glyphicon-arrow-up"></i>
                                        Marcar Salida
                                    </button>
                                </td>
                            </tr>
                        
                        @empty
                                <tr>
                                    <td colspan="6">
                                        -- No se han encontrado datos --
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" colspan="6" >
                                        <br>
                                        <a class="btn btn-primary tbn-lg" href="{{ url('/') }}">
                                        <i class="fa fa-return"></i> Regresar
                                        </a>
                                    </td>
                                </tr>
                        @endforelse
                        
                    </table>
                        </div>
                    </form>
                    <!--button type="button" class="btn btn-success btn-lg btn-block" id="btn-save" value="add">Marcar Asistencia</button-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection