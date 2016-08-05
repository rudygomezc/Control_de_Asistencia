@extends('layouts.app2')

@section('content')

<div class="container">  
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>
                        <center>
                            Lista de Reportes
                        </center>
                    </h4>
                </div>
                
                
                <div class="panel-body">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="well well-lg">
                                <form method="GET" action="{{ url('reportes/buscarfecha') }}">
                                    {{ csrf_field() }}
                                    <table>
                                        <tr>
                                            <td>
                                                Desde  
                                            </td>
                                            <td>
                                                Hasta
                                            </td>
                                            <td>
                                                 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" placeholder="AAAAA--MM-DD" id="ini" name="ini" >  
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="AAAAA-MM-DD" id="fin" name="fin" >  
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-primary" type="button">
                                                    <i class="fa fa-search"></i>
                                                    buscarfecha
                                                </button>  
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="well well-lg">
                                <form method="GET" action="{{ url('reportes/buscar') }}">
                                    {{ csrf_field() }}
                                    <table>
                                        <tr>
                                            <td>
                                                Busqueda por tipo: {{ $select }}
                                            </td>
                                            <td>
                                                
                                            </td>
                                            <td>
                                                 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                               <input type="text" class="form-control" placeholder="Ingrese Valor" value="{{$buscar}}" id="busc" name="busc" > 
                                            </td>
                                            <td>
                                                <select name="seltipo" id="seltipo" class="form-control" >
                                                    
                                                    @if ( $select === 'todos')
                                                        <option value="todos" selected > Todos </option>
                                                    @else
                                                        <option value="todos"> Todos </option>
                                                    @endif
                                                    
                                                    @if ( $select === 'codigo')
                                                        <option value="codigo" selected > Codigo </option>
                                                    @else
                                                        <option value="codigo"> Codigo </option>
                                                    @endif
                                                    
                                                    @if ( $select === 'nombre')
                                                        <option value="nombre" selected > Nombre </option>
                                                    @else
                                                        <option value="nombre"> Nombre </option>
                                                    @endif
                                                    
                                                    @if ( $select === 'grupo')
                                                        <option value="grupo" selected > Grupo </option>
                                                    @else
                                                        <option value="grupo"> Grupo </option>
                                                    @endif
                                                    
                                                    @if ( $select === 'tipo')
                                                        <option value="tipo" selected > Tipo </option>
                                                    @else
                                                        <option value="tipo"> Tipo </option>
                                                    @endif
                                                                                        
                                                </select>
                                            </td>
                                            <td>
                                                <select name="selsubtipo" id="selsubtipo" class="form-control" >
                                                    <option value="Del trabajo"> Del trabajo </option>
                                                    <option value="Del almuerzo"> Del Almuerzo </option>                                  
                                                </select>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-primary" type="button">
                                                    <i class="fa fa-search"></i>
                                                    Buscar
                                                </button>  
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                        
                    <table class="table table-striped" align="center" >
                        <thead class="thead-default">
                            <tr align="center">
                                <th>IdAsis.</th>
                                <th>IdPers.</th>
                                <th>Nombre</th>
                                <th>Grupo</th>
                                <th>Tipo</th>
                                <th>Subtipo</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Hora_Est</th>
                                <th ="center">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($model2 as $m)
                                <tr height="10px" >
                                    <td>{{ $m->id_asistencia }}</td>
                                    <td>{{ $m->id_personal }}</td>
                                    <td>
                                        <a href="ver/{{ $m->id_personal }}">
                                        {{ $m->nombre }}
                                        </a>
                                    </td>
                                    <td> {{ $m->nombreg }} </td>
                                    <td> {{ $m->tipo }} </td>
                                    <td> {{ $m->subtipo }} </td>
                                    <td> {{ $m->fecha }} </td>
                                    <td> {{ $m->hora }} </td>
                                    <td> {{ $m->hora_entrada }} </td>
                                    
                                        @if ( $m->hora > $m->hora_entrada )
                                            <td bgcolor="#F5A9BC" >
                                                ->Tarde
                                            </d>
                                        @else
                                            <td bgcolor="#81F781">
                                                ->Puntual
                                            </td>
                                        @endif
                                            
                                        @yield('content')
                                    
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
                        <?php $model2->setPath('custom/url'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
