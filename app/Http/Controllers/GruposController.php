<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Repository\GruposRepository;
use App\Repository\HorariosRepository;

class GruposController extends Controller {

	private $grupoRepo;
    private $HorarioRepo;

	public function __CONSTRUCT(GruposRepository $grupoRepo, HorariosRepository $horarioRepo){
		$this->grupoRepo=$grupoRepo;
        $this->horarioRepo=$horarioRepo;
	}

    public function getIndex(){
        return view('grupos/index', ['model' => $this->grupoRepo->listar()
        	]);
    }
    
    public function getCrud($id = 0){
        return view('grupos/crud', [
        		'model' => ($id > 0 ? $this->grupoRepo->obtener($id) : null),
                'model2' => $this->horarioRepo->listar()
        	]);
    }

    public function getEliminar($id){
        $this->grupoRepo->eliminar( $id );
        return redirect( 'grupos/index' );
    }
    
    public function postCrud(Request $recuest){
    	$this->grupoRepo->Guardar( $recuest );
    	return redirect( 'grupos/index' );
    }
    
    public function getVer( $id_personal_grupos ){
        /**$personal = DB::select('select * from users where id = :id', ['id' => $id_personal]);
		return view("personal/ver",['p' => $personal]);*/
        return view('grupos/ver',[
        		'model' => $this->grupoRepo->obtener( $id_personal_grupos )
        	]);
    }
}
