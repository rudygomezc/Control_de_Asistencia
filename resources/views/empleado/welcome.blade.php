<!DOCTYPE html>

@extends('layouts.app')
@section('content')
 
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

<script language="JavaScript" type="text/javascript">
    /*Script del Reloj */
    function actualizaReloj() {
        /* Capturamos la Hora, los minutos y los segundos */
        marcacion = new Date()
        /* Capturamos la Hora */
        Hora = marcacion.getHours()
        /* Capturamos los Minutos
        */
        Minutos = marcacion.getMinutes()
        /* Capturamos los Segundos */
        Segundos = marcacion.getSeconds()
        /*variable para el apóstrofe de am o pm*/
        dn = "a.m"
        if (Hora > 12) {
            dn = "p.m"
            Hora = Hora - 12
        }
        if (Hora == 0)
            Hora = 12
        /* Si la Hora, los Minutos o los Segundos son Menores o igual a 9, le añadimos un 0 */
        if (Hora <= 9) Hora = "0" + Hora
        if (Minutos <= 9) Minutos = "0" + Minutos
        if (Segundos <= 9) Segundos = "0" + Segundos
        /* Termina el Script del Reloj */

        /*Script de la Fecha */

        var Dia = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        var Mes = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", 
        "Octubre", "Noviembre", "Diciembre");
        var Hoy = new Date();
        var Anio = Hoy.getFullYear();
        var Fecha = Dia[Hoy.getDay()] + ", " + Hoy.getDate() + " de " + Mes[Hoy.getMonth()] + " de " + Anio + ". ";

        /* Termina el script de la Fecha */

        /* Creamos 2 variables para darle formato a nuestro Script */
        var Script, Total

        /* En Reloj le indicamos la Hora, los Minutos y los Segundos */
        Script = '<center><h1>' + Hora + ":" + Minutos + ":" + Segundos + " " + dn + "</h1>" + "<br>" + Fecha + "</center>" 

        /* En total Finalizamos el Reloj uniendo las variables */
        Total = Script

        /* Capturamos una celda para mostrar el Reloj */
        document.getElementById('Fecha_Reloj').innerHTML = Total

        /* Indicamos que nos refresque el Reloj cada 1 segundo */
        setTimeout("actualizaReloj()", 1000)
    }
</script>