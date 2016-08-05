<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Repository\HorariosRepository;

class HorariosController extends Controller {

	private $horarioRepo;

	public function __CONSTRUCT(HorariosRepository $horarioRepo){
		$this->horarioRepo=$horarioRepo;
	}

    public function getIndex(){
        return view('horarios/index', ['model' => $this->horarioRepo->listar()
        	]);
    }
    
    public function getCrud($id = 0){
        return view('horarios/crud', [
        		'model' => ($id > 0 ? $this->horarioRepo->obtener($id) : null)
        	]);
    }

    public function getEliminar($id){
        $this->horarioRepo->eliminar( $id );
        return redirect( 'horarios/index' );
    }
    
    public function postCrud(Request $recuest){
    	$this->horarioRepo->Guardar( $recuest );
    	return redirect( 'horarios/index' );
    }
    
    public function getVer( $id_personal_grupos ){
        return view('horarios/ver',[
        		'model' => $this->horarioRepo->obtener( $id_personal_grupos )
        	]);
    }
}
