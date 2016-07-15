@extends('layouts.app')

@section('content')

$name = Request::input('name');

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Datos de Empleado:</div>
                <div class="panel-body">
                    <h1 class="page-header">
                        {{ $model->name }}
                    </h1>
                    
                    <h3> E-mail</h3>
                    <p>{{ $model->name }}</p>
                    
                    <h3> Direccion</h3>
                    <p>{{ $model->direccion }}</p>
                    
                    <h3> telefono</h3>
                    <dd>{{ $model->telefono }}</dd>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
