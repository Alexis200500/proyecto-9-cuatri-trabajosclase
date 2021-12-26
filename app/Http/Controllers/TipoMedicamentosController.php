<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tipo_medicamentos;
use App\Models\medicamentos;
use Session;

class TipoMedicamentosController extends Controller
{
    public function alta_tipomedicamentos(){
        $consulta = tipo_medicamentos::orderBy('idtipomed','DESC')
            ->take(1)->get();
        
        $cuantos = count($consulta);
        if ($cuantos==0) {
            $idesigue = 1;
        } else {
            $idesigue = $consulta[0]->idtipomed + 1;
        }

        // return $idesigue;
        return view('tipo_medicamentos.alta')
        ->with('idesigue',$idesigue);
    }
    public function guarda_tipomedicamentos(Request $request){
        $this->validate($request,[
            'tipo'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
        ]);

        $tipo_medicamentos = new tipo_medicamentos;
        $tipo_medicamentos->idtipomed = $request->idtipomed;
        $tipo_medicamentos->tipo = $request->tipo;
        $tipo_medicamentos->save();

            Session::flash('mensaje',"El municipio $request->tipo sido creado correctamente");

            return redirect()->route('reportes_tipomedicamentos');
        
    }
    public function reportes_tipomedicamentos(){
        $consulta = tipo_medicamentos::withTrashed('idtipomed','tipo','deleted_at')
        ->orderBy('tipo_medicamentos.tipo')
        ->get();
        // return $consulta;
        return view('tipo_medicamentos.reportes')
                ->with('consulta',$consulta); 
         
    }
    public function modifica_tipomedicamentos($idtipomed){
        $consulta = tipo_medicamentos::withTrashed('idtipomed','tipo','deleted_at')
        ->where('idtipomed',$idtipomed)
        ->get();
        return view('tipo_medicamentos.modifica')
        ->with('consulta',$consulta[0]);
    }
    public function guardarcambios_tipomedicamentos(Request $request){
        
        $this->validate($request,[
            'tipo'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
        ]);

        $tipo_medicamentos = tipo_medicamentos::withTrashed()->find($request->idtipomed);
        $tipo_medicamentos->idtipomed = $request->idtipomed;
        $tipo_medicamentos->tipo = $request->tipo;
        $tipo_medicamentos->save();
       
        Session::flash('mensaje',"El tipo de medicamento ha sido modificado");
        
        return redirect()->route('reportes_tipomedicamentos');
        
    }
    public function activar_tipomedicamentos($idtipomed){
        $tipo_medicamentos=tipo_medicamentos::withTrashed()->where('idtipomed',$idtipomed)->restore();

        Session::flash('mensaje',"El tipo de medicamento sido activado correctamente");

        return redirect()->route('reportes_tipomedicamentos');
        
    }
    public function desactivar_tipomedicamentos($idtipomed){
        $tipo_medicamentos=tipo_medicamentos::find($idtipomed);
        $tipo_medicamentos->delete();

        Session::flash('mensaje',"El tipo de medicamento sido desactivado correctamente");

        return redirect()->route('reportes_tipomedicamentos');
    }
    public function eliminar_tipomedicamentos($idtipomed){
        $buscamedicamentos = medicamentos::where('idtipomed',$idtipomed)->get();
        $cuantos = count($buscamedicamentos);
        if($cuantos==0)
        {
            $tipo_medicamentos=tipo_medicamentos::withTrashed()->find($idtipomed)->forceDelete();
            Session::flash('mensaje',"El tipo de medicamento ha sido eliminado del sistema correctamente");
        
            return redirect()->route('reportes_tipomedicamentos');
        }
        else{

            Session::flash('mensaje',"El tipo de medicamento no se puede eliminar por que tiene 
                                        registros en otras tablas");

            return redirect()->route('reportes_tipomedicamentos');

        }
    }
}
