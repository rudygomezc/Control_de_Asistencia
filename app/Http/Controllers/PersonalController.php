<?php

namespace App\Http\Controllers;

use App\Personal;
use App\Grupos;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Fancades\Redirect;
use Laracasts\Flash\Flash;
use DB;
use App\Repository\PersonalRepository;
use App\Repository\GruposRepository;

class PersonalController extends Controller {

	private $personalRepo;
    private $grupoRepo;

	public function __CONSTRUCT(PersonalRepository $personalRepo, GruposRepository $grupoRepo){
		$this->personalRepo=$personalRepo;
        $this->grupoRepo=$grupoRepo;
	}

    public function getIndex(){
        //$personal = Personal::all();
        
        $personal = DB::table('personal')
            ->join('personal_grupos', 'personal.id_personal_grupos', '=', 'personal_grupos.id_personal_grupos')
            ->select('personal.id_personal', 'personal_grupos.nombreg', 'personal.nombre', 'personal.apellido', 'personal.dni', 'personal.telefono', 'personal.direccion', 'personal.email')
            ->paginate(5);
            
        
        return view('personal/index', [
            'model2' => $personal
        ]);
        
        
        //return view('personal/index')
            //->with('model', $personal);
    }
    
    public function getCrud($id = 0){
        
        $var = DB::table('personal')->count();
        
        /**return view('personal/crud', [
        		'model' => ($id > 0 ? null : $this->personalRepo->obtener($id)), 
                'model2' => $this->grupoRepo->listar(),
                'var' => $var
        	]);*/
        if($id != '0'){
         
            return view('personal/crud', [
        		'model' => ($id > 0 ?  null : $this->personalRepo->obtener($id) ), 
                'model2' => $this->grupoRepo->listar(),
                'var' => $var
        	]);
        }else{
            
            return view('personal/crud', [
        		'model' => (null), 
                'model2' => $this->grupoRepo->listar(),
                'var' => $var
        	]);
            
        }
        
         
    }

    public function getEliminar($id){
        $this->personalRepo->eliminar( $id );
        return redirect( 'personal/index' );
    }
    
    public function postCrud(Request $recuest){
    	$this->personalRepo->Guardar( $recuest );
    	return redirect( 'personal/index' );
    }
    
    public function getBuscar(Request $data){
        $personal = DB::table('personal')
            ->join('personal_grupos', 'personal.id_personal_grupos', '=', 'personal_grupos.id_personal_grupos')
            ->select('personal.id_personal', 'personal_grupos.nombreg', 'personal.nombre', 'personal.apellido', 'personal.dni', 'personal.telefono', 'personal.direccion', 'personal.email')
            ->where('nombre', $data['busc'])
            ->paginate(5);
        /**$arreglo = DB::table('personal')
                    ->where('id_personal', $data['busc'])
                    ->get();*/
        return view('personal/index',[
        		'model2' => $personal
        	]);
    }
    
    public function getVer( $id_personal ){
        /**$personal = DB::select('select * from users where id = :id', ['id' => $id_personal]);
		return view("personal/ver",['p' => $personal]);*/
        return view('personal/ver',[
        		'model' => $this->personalRepo->obtener( $id_personal )
        	]);
    }
    
}
