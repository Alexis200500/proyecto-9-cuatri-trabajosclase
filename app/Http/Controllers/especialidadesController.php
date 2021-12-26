<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\especialidades;
use App\Models\odontologos;
use Session;


class especialidadesController extends Controller
{
    public function alta_especialidades(){
        $consulta = especialidades::orderBy('idesp','DESC')
            ->take(1)->get();
        
        $cuantos = count($consulta);
        if ($cuantos==0) {
            $idesigue = 1;
        } else {
            $idesigue = $consulta[0]->idesp + 1;
        }

        // return $idesigue;
        return view('especialidades.alta')
        ->with('idesigue',$idesigue);
    }
    public function guarda_especialidades(Request $request){
        $this->validate($request,[
            'especialidad'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
        ]);

        $especialidades = new especialidades;
        $especialidades->idesp = $request->idesp;
        $especialidades->especialidad = $request->especialidad;
        $especialidades->save();

            Session::flash('mensaje',"La especialidad $request->especialidad sido creada correctamente");

            return redirect()->route('reportes_especialidades');
        
    }
    public function reportes_especialidades(){
        $consulta = especialidades::withTrashed('idesp','especialidad','deleted_at')
        ->orderBy('especialidades.especialidad')
        ->get();
        // return $consulta;
        return view('especialidades.reportes')
                ->with('consulta',$consulta); 
         
    }
    public function modifica_especialidades($idesp){
        $consulta = especialidades::withTrashed('idesp','especialidad','deleted_at')
        ->where('idesp',$idesp)
        ->get();
        return view('especialidades.modifica')
        ->with('consulta',$consulta[0]);
    }
    public function guardarcambios_especialidades(Request $request){
        
        $this->validate($request,[
            'especialidad'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
        ]);

        $especialidades = especialidades::withTrashed()->find($request->idesp);
        $especialidades->idesp = $request->idesp;
        $especialidades->especialidad = $request->especialidad;
        $especialidades->save();
       
        Session::flash('mensaje',"La especialidad ha sido modificada");
        
        return redirect()->route('reportes_especialidades');
        
    }
    public function activar_especialidades($idesp){
        $especialidades=especialidades::withTrashed()->where('idesp',$idesp)->restore();

        Session::flash('mensaje',"La especialidad ha sido activada correctamente");

        return redirect()->route('reportes_especialidades');
        
    }
    public function desactivar_especialidades($idesp){
        $especialidades=especialidades::find($idesp);
        $especialidades->delete();

        Session::flash('mensaje',"La especialidad ha sido desactivada correctamente");

        return redirect()->route('reportes_especialidades');
    }
    public function eliminar_especialidades($idesp){
        $buscaodontologo = odontologos::where('idesp',$idesp)->get();
        $cuantos = count($buscaodontologo);
        if($cuantos==0)
        {
            $especialidades=especialidades::withTrashed()->find($idesp)->forceDelete();
            Session::flash('mensaje',"La especialidad ha sido eliminada del sistema correctamente");
        
            return redirect()->route('reportes_especialidades');
        }
        else{

            Session::flash('mensaje',"La especialidad no se puede eliminar por que tiene 
                                        registros en otras tablas");

            return redirect()->route('reportes_especialidades');

        }
    }
}
