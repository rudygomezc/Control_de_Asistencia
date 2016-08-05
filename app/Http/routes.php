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

    return view('/welcome',[
                'msg' => 0
            ]);
});

Route::auth();

Route::get('/home', 'HomeController@index');

/* CONTROLAORES*/

Route::controller('asistencia','AsistenciaController');
Route::controller('personal','PersonalController');
Route::controller('grupos','GruposController');
Route::controller('horarios','HorariosController');
Route::controller('reportes','ReportesController');