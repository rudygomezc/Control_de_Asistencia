<?php

namespace App\Repository;
use DB;
use App\Horarios;

class HorariosRepository
{
    public function listar(){
    	return Horarios::all();
    }

    public function obtener($id_personal){
        $modelo = Horarios::where('id_horario', '=', $id_personal)->firstOrFail();
    	return $modelo;
    }

    public function Guardar($data){
        
    	$horario = new Horarios();

        if($data['id'] > 0){
            DB::update('update horarios set 
                descripcion = :desc,
                hora_entrada = :hent,
                hora_salida = :hsal,
                hora_salida_almuerzo = :hsaa,
                hora_entrada_almuerzo = :heal
                where id_horario = :id', [
                    'id' => $data['id'], 
                    'desc' => $data['desc'],
                    'hent' => $data['hent'],
                    'hsal' => $data['hsal'],
                    'hsaa' => $data['hsaa'],
                    'heal' => $data['heal']
                ]);
            
            //UPDATE `personal` SET `id_personal_grupos` = '222222' WHERE `personal`.`id_personal` = 2;
        }else{
            $horario->descripcion = $data['desc'];
            $horario->hora_entrada = $data['hent'];
            $horario->hora_salida = $data['hsal'];
            $horario->hora_salida_almuerzo = $data['hsaa'];
            $horario->hora_entrada_almuerzo = $data['heal'];

            $horario->save();   
        }
    }
    public function eliminar($id){
        $results = DB::delete('delete from personal where id_personal = :id', ['id' => $id]);
    }
}