<?php

namespace App\Http\Controllers;

use App\Personal;
use App\Asistencia;
use App\Grupos;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Fancades\Redirect;
use Laracasts\Flash\Flash;
use DB;
use App\Repository\PersonalRepository;
use App\Repository\GruposRepository;
use App\Repository\ReportesRepository;

class ReportesController extends Controller {

    private $reporteRepo;

	public function __CONSTRUCT(ReportesRepository $reporteRepo){
        $this->reporteRepo=$reporteRepo;
	}

    public function getIndex(){
        //$reportes = Asistencia::all();
        
        $reportes = DB::table('asistencia')
            ->join('personal', 'personal.id_personal', '=', 'asistencia.id_personal')
            ->join('personal_grupos', 'personal.id_personal_grupos', '=', 'personal_grupos.id_personal_grupos')
            ->join('horarios', 'horarios.id_horario', '=', 'personal_grupos.id_horario')
            ->select('asistencia.id_asistencia', 
                     'asistencia.id_personal',
                     'personal.nombre',
                     'personal_grupos.nombreg',
                     'asistencia.tipo', 
                     'asistencia.subtipo', 
                     'asistencia.fecha', 
                     'asistencia.hora',
                     'horarios.hora_entrada')
            ->paginate(5);
          
        
        return view('reportes/index', [
            'model2' => $reportes,
            'select' => '',
            'buscar' => ''
        ]);
    }  

    public function getEliminar($id){
        $this->reporteRepo->eliminar( $id );
        return redirect( 'reportes/index' );
    }
    
    public function getPaginar($model, $pagina){
        return view('reportes/index', [
            'model2' => $model,
            'buscar' => '',
            'pagina' => pagina
        ]);
    }
    
    public function getBuscar(Request $data){
        
        /**$condicion='';
        $valor='';
        
        if($data['seltipo']=='todos'){
            return redirect( 'reportes/index' );
        }else if($data['seltipo']=='codigo'){
            
        }else if($data['seltipo']=='nombre'){
            $condicion = 'personal.nombre';
            $valor = $data['busc'];
        }else if($data['seltipo']=='grupo'){
            $condicion = 'personal_grupos.nombreg';
            $valor = $data['busc'];
        }else if($data['seltipo']=='tipo'){
            $condicion = 'asistencia.tipo';
            $valor = $data['busc'];
        }
        
            
        $reportes2 = DB::table('asistencia')
            ->join('personal', 'personal.id_personal', '=', 'asistencia.id_personal')
            ->join('personal_grupos', 'personal.id_personal_grupos', '=', 'personal_grupos.id_personal_grupos')
            ->select('asistencia.id_asistencia', 
                     'asistencia.id_personal',
                     'personal.nombre',
                     'personal_grupos.nombreg',
                     'asistencia.tipo', 
                     'asistencia.subtipo', 
                     'asistencia.fecha', 
                     'asistencia.hora')
            ->where($condicion, $valor)
            ->Paginate(20);
        return view('reportes/index',[
            'model2' => $reportes2,
            'select' => $data['seltipo']
        ]);*/
        if($data['seltipo']=='todos'){
            return redirect( 'reportes/index' );
            break;
        }else if($data['seltipo']=='codigo'){
            $reportes2 = DB::table('asistencia')
            ->join('personal', 'personal.id_personal', '=', 'asistencia.id_personal')
            ->join('personal_grupos', 'personal.id_personal_grupos', '=', 'personal_grupos.id_personal_grupos')
            ->select('asistencia.id_asistencia', 
                     'asistencia.id_personal',
                     'personal.nombre',
                     'personal_grupos.nombreg',
                     'asistencia.tipo', 
                     'asistencia.subtipo', 
                     'asistencia.fecha', 
                     'asistencia.hora')
            ->where('personal.id_personal', $data['busc'])
            ->paginate(20);
            return view('reportes/index',[
        		'model2' => $reportes2,
                'select' => $data['seltipo'],
                'buscar' => $data['busc']
        	]);
            break;
        }else if($data['seltipo']=='nombre'){
            $reportes2 = DB::table('asistencia')
            ->join('personal', 'personal.id_personal', '=', 'asistencia.id_personal')
            ->join('personal_grupos', 'personal.id_personal_grupos', '=', 'personal_grupos.id_personal_grupos')
            ->select('asistencia.id_asistencia', 
                     'asistencia.id_personal',
                     'personal.nombre',
                     'personal_grupos.nombreg',
                     'asistencia.tipo', 
                     'asistencia.subtipo', 
                     'asistencia.fecha', 
                     'asistencia.hora')
            ->where('personal.nombre', $data['busc'])
            ->paginate(20);
            return view('reportes/index',[
        		'model2' => $reportes2,
                'select' => $data['seltipo'],
                'buscar' => $data['busc']
        	]);
            break;
        }else if($data['seltipo']=='grupo'){
            $reportes3 = DB::table('asistencia')
            ->join('personal', 'personal.id_personal', '=', 'asistencia.id_personal')
            ->join('personal_grupos', 'personal.id_personal_grupos', '=', 'personal_grupos.id_personal_grupos')
            ->select('asistencia.id_asistencia', 
                     'asistencia.id_personal',
                     'personal.nombre',
                     'personal_grupos.nombreg',
                     'asistencia.tipo', 
                     'asistencia.subtipo', 
                     'asistencia.fecha', 
                     'asistencia.hora')
            ->where('personal_grupos.nombreg', $data['busc'])
            ->paginate(20);
            return view('reportes/index',[
        		'model2' => $reportes3,
                'select' => $data['seltipo'],
                'buscar' => $data['busc']
        	]);
            break;
        }else if($data['seltipo']=='tipo'){
            $reportes4 = DB::table('asistencia')
            ->join('personal', 'personal.id_personal', '=', 'asistencia.id_personal')
            ->join('personal_grupos', 'personal.id_personal_grupos', '=', 'personal_grupos.id_personal_grupos')
            ->select('asistencia.id_asistencia', 
                     'asistencia.id_personal',
                     'personal.nombre',
                     'personal_grupos.nombreg',
                     'asistencia.tipo', 
                     'asistencia.subtipo', 
                     'asistencia.fecha', 
                     'asistencia.hora')
            ->where('asistencia.tipo', $data['busc'])
            ->where('asistencia.subtipo', $data['selsubtipo'])
            ->paginate(20);
            return view('reportes/index',[
        		'model2' => $reportes4,
                'select' => $data['seltipo'],
                'buscar' => $data['busc'],
        	]);
            break;
        }
        
    }
    
    public function getBuscarfecha(Request $data){
        $reportes4 = DB::table('asistencia')
            ->join('personal', 'personal.id_personal', '=', 'asistencia.id_personal')
            ->join('personal_grupos', 'personal.id_personal_grupos', '=', 'personal_grupos.id_personal_grupos')
            ->select('asistencia.id_asistencia', 
                     'asistencia.id_personal',
                     'personal.nombre',
                     'personal_grupos.nombreg',
                     'asistencia.tipo', 
                     'asistencia.subtipo', 
                     'asistencia.fecha', 
                     'asistencia.hora')
            ->where('asistencia.fecha', '>=', $data['ini'])
            ->where('asistencia.fecha', '<=', $data['fin'])
            //WHERE fecha BETWEEN '20121201' AND '20121202'
            ->paginate(20);
        
        return view('reportes/index',[
        	'model2' => $reportes4
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
