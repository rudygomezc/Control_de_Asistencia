<?php

namespace App\Repository;
use DB;
use App\Personal;

class PersonalRepository
{
    public function listar(){
    	return Personal::all();
    }

    public function obtener($id_personal){
        $modelo = Personal::where('id_personal', '=', $id_personal)->firstOrFail();
    	return $modelo;
    }
    
    public function obtener2($data){
        //$results = DB::select('select * from users where id = ?', [1]);
        $modelo = DB::select('select * from personal where nombre = ?', [ $data['busc'] ]);
    	return $modelo;
    }

    public function Guardar($data){
        
    	$personal = new Personal();

        if($data['id'] == 0){
            
            
            DB::insert('insert into personal (
                id_personal,
                id_personal_grupos,
                nombre,
                apellido,
                dni,
                telefono,
                direccion,
                email) values(
                    ?, ?, ?, ?, ?, ?, ?, ?
                )',[
                    $data['idid'],
                    $data['idgr'],
                    $data['nomb'],
                    $data['apel'],
                    $data['dni'],
                    $data['tele'],
                    $data['dire'],
                    $data['emai']
                ]);
            
            //UPDATE `personal` SET `id_personal_grupos` = '222222' WHERE `personal`.`id_personal` = 2;
        }else{
            
            //DB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle']);
            
            DB::update('update personal set 
                id_personal_grupos = :idgr,
                nombre = :nomb,
                apellido = :apel,
                dni = :dni,
                telefono = :tele,
                direccion = :dire,
                email = :emai
                where id_personal = :id', [
                    'id' => $data['id'], 
                    'idgr' => $data['idgr'],
                    'nomb' => $data['nomb'],
                    'apel' => $data['apel'],
                    'dni' => $data['dni'],
                    'tele' => $data['tele'],
                    'dire' => $data['dire'],
                    'emai' => $data['emai']
                ]);
        }
    }
    public function eliminar($id){
        $results = DB::delete('delete from personal where id_personal = :id', ['id' => $id]);
    }
}