<?php

namespace App\Repository;
use DB;
use App\Grupos;

class GruposRepository
{
    public function listar(){
    	return Grupos::all();
    }

    public function obtener($id_personal_grupos){
        $modelo = Grupos::where('id_personal_grupos', '=', $id_personal_grupos)->firstOrFail();
    	return $modelo;
    }

    public function Guardar($data){
        
    	$grupos = new Grupos();

        if($data['id'] > 0){
            DB::update('update personal_grupos set 
                id_horario = :idho,
                nombre = :nomb
                where id_personal_grupos = :id', [
                    'id' => $data['id'], 
                    'idho' => $data['idho'],
                    'nomb' => $data['nomb']
                ]);
        }else{
            $grupos->id_horario = $data['idho'];
            $grupos->nombre = $data['nomb'];

            $grupos->save();   
        }
    }
    public function eliminar($id){
        $results = DB::delete('delete from personal_grupos where id_personal_grupos = :id', ['id' => $id]);
    }
}