@extends('layouts.app')
@section('content')



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

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">Datos de Empleado:</div>
                <div class="panel-body" align="center">
                    
                    <form method="POST" action="{{ url('asistencia/crud3/') }}">
                        {{ csrf_field() }}
                        
                        <input type="hidden" id="id" name="id" value="{{ is_object($model) ? $model->id : 0}}">
                        
                        <?php                    
                            $hoy = date("Y-m-d");         
                            echo "<input type='hidden' id='fecha' name='fecha' value='$hoy'>";
                            $hoy = date(":i:s");
                            $hoy2 = date("H")-5;      
                            echo "<input type='hidden' id='hora' name='hora' value='$hoy2$hoy'>";
                        ?>
                    
                    <table align="center" class="" bgcolor="#DAD9D9" >
                        <tr>
                            <td id="Fecha_Reloj" colspan="">kajshdkjsahdkj</td>
                        </tr>
                        <tr bgcolor="#D1D1D1">
                            <td rowspan="4" align="center" width="200"> <img src="../img/gato.jpg" width="170" height="150"></td>
                            <td width="400"><h1 class="page-header" align="center"> {{ $model->name }}, {{ $model->apellido }}</h1></td>
                        </tr>
                        <tr  bgcolor="#D1D1D1">
                            <td align="center">E-mail: {{ $model->email }}</td>
                        </tr>
                        <tr  bgcolor="#D1D1D1">
                            <td align="center">Direccion: {{ $model->direccion }}</td>
                        </tr>
                        <tr  bgcolor="#D1D1D1">
                            <td align="center">Telefono: {{ $model->telefono }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center" height="50">
                                <button type="submit" class="btn btn-primary tbn-lg btn-block">
                                    Marcar Asistencia
                                </button>
                            
                            </td>
                        </tr>
                    </table>
                    </form>
                    <!--button type="button" class="btn btn-success btn-lg btn-block" id="btn-save" value="add">Marcar Asistencia</button-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection