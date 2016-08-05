<?php

namespace App\Repository;

use DB;
use App\Empleado;
use App\Personal;
use App\asistencia;

class EmpleadoRepository
{
    public function listar(){
    	return Empleado::all();
    }

    public function obtener($idempleado){
    	return Empleado::find( $idempleado );
    }
    
    public function obtener3($data){
        return Empleado::find( $data['id'] );
    }

    public function obtener2($data){
    	$modelo = DB::select('select * from personal where id_personal = ?', [ $data['codigo'] ]);
        return $modelo;
    }

    public function Guardar($data){
        
    	$empleado = new Empleado();

        if($data['id'] > 0){
            $empleado->exists = true;
            $empleado->id = $data['id'];
        }

    	$empleado->name = $data['nombre'];
    	$empleado->email = $data['email'];
    	$empleado->direccion = $data['direccion'];
    	$empleado->telefono = $data['telefono'];
    	$empleado->profesion = $data['profesion'];
    	$empleado->habilitado = $data['habilitado'];
        
    	$empleado->save();
    }
    
    public function GuardarAsistencia($data){
        
    	$asistencia = new asistencia();
        
    	$asistencia->id_personal = $data['id'];
    	if($data['btnsalida'] == 'salida'){
            $asistencia->tipo = 'Salida';    
        }else{
            $asistencia->tipo = 'Entrada';
        }
    	$asistencia->subtipo = $data['optsubtipo'];
    	$asistencia->fecha = $data['fecha'];
        $asistencia->hora = $data['hora'];
        
        //Flash::success("Se ha registrado el usuario ".$asistencia->id_peronal." de manera exitosa!");
        
        $asistencia->save();
    }

    public function eliminar($id){
        Empleado::destroy( $id );
    }
}