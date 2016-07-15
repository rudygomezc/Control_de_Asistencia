<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Repository\EmpleadoRepository;

class AsistenciaController extends Controller {

	private $empleRepo;

	public function __CONSTRUCT(EmpleadoRepository $empleRepo){
		$this->empleRepo=$empleRepo;
	}

    public function getIndex(){
        return view('empleado/index', ['model' => $this->empleRepo->listar()
        	]);
    }

    public function getCrud($id = 0){
        return view('empleado/crud', [
        		'model' => ($id > 0 ? $this->empleRepo->obtener($id) : null)
        	]);
    }

    public function getEliminar($id){
        $this->empleRepo->eliminar( $id );
        return redirect( 'asistencia/index' );
    }

    public function postCrud3(Request $recuest){
    	$this->empleRepo->GuardarAsistencia( $recuest );
    	//return redirect( '/', $recuest['id'] );
        return view('/welcome',[
                'model' => $this->empleRepo->obtener3( $recuest )
            ]);
    }
    
    public function postCrud(Request $recuest){
    	$this->empleRepo->Guardar( $recuest );
    	return redirect( 'asistencia/index' );
    }
    
    public function postCrud2(Request $recuest){
    	return view('empleado/ver2',[
        		'model' => $this->empleRepo->obtener2( $recuest )
        	]);
    }

    public function getVer( $idempleado ){
        return view('empleado/ver',[
        		'model' => $this->empleRepo->obtener( $idempleado )
        	]);
    }
    
    public function getWelcome(  ){
        return view('empleado/index', ['model' => $this->empleRepo->listar()
        	]);
    }
    
}
