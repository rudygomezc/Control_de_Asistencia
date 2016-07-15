<?php

namespace App\Repository;

use App\Empleado;
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
    	return Empleado::find( $data['codigo'] );
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
    	$asistencia->tipo = 'Normal';
    	$asistencia->subtipo = 'Normal';
    	$asistencia->fecha = $data['fecha'];
        $asistencia->hora = $data['hora'];
        
        
        $asistencia->save();
    }

    public function eliminar($id){
        Empleado::destroy( $id );
    }
}