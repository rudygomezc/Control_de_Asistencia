<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Empleado;

Route::get('/', function () {
    
    $empleado = Empleado::all();

    return View::make('welcome')->with('model',$empleado);
});

Route::get('/empleado/{id?}',function($id){
    $task = Task::find($id);

    return Response::json($empleado);
});

Route::post('/empleado',function(Request $request){
    $task = Task::create($request->all());

    return Response::json($empleado);
});

Route::put('/empleado/{id?}',function(Request $request,$id){
    $task = Task::find($id);

    $empleado->name = $request->name;
    $empleado->telefono = $request->telefono;

    $empleado->save();

    return Response::json($empleado);
});

Route::delete('/empleado/{id?}',function($id){
    $empleado = Empleado::destroy($id);

    return Response::json($empleado);
});

Route::auth();

Route::get('/home', 'HomeController@index');

/* CONTROLAORES*/

Route::controller('asistencia','AsistenciaController');