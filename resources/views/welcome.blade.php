<!DOCTYPE html>

@extends('layouts.app')
@section('content')
<script src="{{asset('js/fecha_hora.js')}}"></script>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" style="  " align="center" > .::::Bienvenidos::::.. </div>
                <div class="panel-body">
                    <body onload="actualizaReloj()">
                        <center>
                            
                            <form method="post" action="{{ url('asistencia/crud2') }}">
                                {{ csrf_field() }}
                            <table class="table">
                                <tr>
                                    <td id="Fecha_Reloj" colspan="3"></td>
                                </tr>
                                <tr>
                                    <td width="25%" style="text-align:right;">
                                        <label>Ingrese Codigo:</label>
                                    </td>
                                    <td width="25%">
                                        <input class="form-control" type="text" name="codigo" id="codigo" />
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-primary tbn-lg btn-block">
                                            Buscar
                                        </button>
                                    </td>
                                </tr>
                            </table>
                            </form>
                                    
                        </center>
                    </body>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
