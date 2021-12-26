<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\medicamentos;
use App\Models\tipo_medicamentos;
use App\Models\det_consu_receta;
use Session;

class MedicamentosController extends Controller
{
    public function alta_medicamentos(){
        $consulta = medicamentos::orderBy('idmed','DESC')
            ->take(1)->get();
        
        $cuantos = count($consulta);
        if ($cuantos==0) {
            $idesigue = 1;
        } else {
            $idesigue = $consulta[0]->idmed + 1;
        }

        $tipo_medicamentos = tipo_medicamentos::orderBy('tipo')->get();

        // return $idesigue;
        return view('medicamentos.alta')
        ->with('idesigue',$idesigue)
        ->with('tipo_medicamentos',$tipo_medicamentos);
    }
    public function guarda_medicamentos(Request $request){
        $this->validate($request,[
            'nombre'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
            'presentacion'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
            'susta_activa'=> 'required|regex:/^[A-Z][A-Z,a-z,0-9, ,á,é,í,ó,ú,ü]+$/',
            ]);

        $medicamentos = new medicamentos;
        $medicamentos->idmed = $request->idmed;
        $medicamentos->nombre = $request->nombre;
        $medicamentos->presentacion = $request->presentacion;
        $medicamentos->susta_activa = $request->susta_activa;
        $medicamentos->idtipomed = $request->idtipomed;
        $medicamentos->save();

            Session::flash('mensaje',"El Medicamento $request->nombre sido creado correctamente");

            return redirect()->route('reportes_medicamentos');
        
    }
    public function reportes_medicamentos(){
        
        $consulta = medicamentos::withTrashed()->join('tipo_medicamentos','medicamentos.idtipomed','=','tipo_medicamentos.idtipomed')
        ->select('medicamentos.idmed','medicamentos.nombre','tipo_medicamentos.tipo as tip',
                 'medicamentos.presentacion','medicamentos.susta_activa','medicamentos.deleted_at')
        ->orderBy('medicamentos.nombre')
        ->get();

        return view('medicamentos.reportes')
                ->with('consulta',$consulta); 
         
    }
    public function activar_medicamentos($idmed){
        $medicamentos=medicamentos::withTrashed()->where('idmed',$idmed)->restore();

        Session::flash('mensaje',"El medicamento sido activado correctamente");

        return redirect()->route('reportes_medicamentos');
        
    }
    public function desactivar_medicamentos($idmed){
        $medicamentos=medicamentos::find($idmed);
        $medicamentos->delete();

        Session::flash('mensaje',"El medicamento sido desactivado correctamente");

        return redirect()->route('reportes_medicamentos');
    }
    public function eliminar_medicamentos($idmed){
        $buscadet_consu_receta = det_consu_receta::where('idmed',$idmed)->get();
        $cuantos = count($buscadet_consu_receta);
        if($cuantos==0)
        {
            $medicamentos=medicamentos::withTrashed()->find($idmed)->forceDelete();
            Session::flash('mensaje',"El medicamento ha sido eliminado del sistema correctamente");
        
            return redirect()->route('reportes_medicamentos');
        }
        else{

            Session::flash('mensaje',"El medicamento no se puede eliminar por que tiene 
                                        registros en otras tablas");

            return redirect()->route('reportes_medicamentos');

        }
    }
    public function modifica_medicamentos($idmed){
        $consulta = medicamentos::withTrashed()->join('tipo_medicamentos','medicamentos.idtipomed','=','tipo_medicamentos.idtipomed')
            ->select('medicamentos.idmed','medicamentos.nombre','tipo_medicamentos.tipo as tm','medicamentos.presentacion',
                    'medicamentos.susta_activa','medicamentos.idtipomed')
            ->where('idmed',$idmed)
            ->get();

        $tipo_medicamentos = tipo_medicamentos::all();
        return view('medicamentos.modifica')
            ->with('consulta',$consulta[0])
            ->with('tipo_medicamentos',$tipo_medicamentos);
            // return $consulta;
    }
    public function cambio_medicamentos(Request $request){
        $this->validate($request,[
            'nombre'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
            'presentacion'=> 'required|regex:/^[A-Z][A-Z,a-z,0-9, ,á,é,í,ó,ú,ü]+$/',
            'susta_activa'=> 'required|regex:/^[A-Z][A-Z,a-z,0-9, ,á,é,í,ó,ú,ü]+$/',
            ]);

        $medicamentos = medicamentos::withTrashed()->find($request->idmed);
        $medicamentos->idmed = $request->idmed;
        $medicamentos->nombre = $request->nombre;
        $medicamentos->presentacion = $request->presentacion;
        $medicamentos->susta_activa = $request->susta_activa;
        $medicamentos->idtipomed = $request->idtipomed;
        $medicamentos->save();

            Session::flash('mensaje',"El Medicamento $request->nombre sido modificado");

            return redirect()->route('reportes_medicamentos');
    }
}
