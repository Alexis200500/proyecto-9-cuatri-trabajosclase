<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\municipios;
use App\Models\odontologos;
use Session;


class MunicipiosController extends Controller
{
    public function alta_municipios(){
        $consulta = municipios::orderBy('idmun','DESC')
            ->take(1)->get();
        
        $cuantos = count($consulta);
        if ($cuantos==0) {
            $idesigue = 1;
        } else {
            $idesigue = $consulta[0]->idmun + 1;
        }

        // return $idesigue;
        return view('municipios.alta')
        ->with('idesigue',$idesigue);
    }
    public function guarda_municipios(Request $request){
        $this->validate($request,[
            'nombre'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
        ]);

        $municipios = new municipios;
        $municipios->idmun = $request->idmun;
        $municipios->nombre = $request->nombre;
        $municipios->save();

            Session::flash('mensaje',"El municipio $request->nombre sido creado correctamente");

            return redirect()->route('reportes_municipios');
        
    }
    public function reportes_municipios(){
        $consulta = municipios::withTrashed('idmun','nombre','deleted_at')
        ->orderBy('municipios.nombre')
        ->get();
        // return $consulta;
        return view('municipios.reportes')
                ->with('consulta',$consulta); 
         
    }
    public function modifica_municipios($idmun){
        $consulta = municipios::withTrashed('idmun','nombre','deleted_at')
        ->where('idmun',$idmun)
        ->get();
        return view('municipios.modifica')
        ->with('consulta',$consulta[0]);
    }
    public function guardarcambios_municipios(Request $request){
        
        $this->validate($request,[
            'nombre'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
        ]);

        $municipios = municipios::withTrashed()->find($request->idmun);
        $municipios->idmun = $request->idmun;
        $municipios->nombre = $request->nombre;
        $municipios->save();
       
        Session::flash('mensaje',"El municipio ha sido modificado");
        
        return redirect()->route('reportes_municipios');
        
    }
    public function activar_municipios($idmun){
        $municipios=municipios::withTrashed()->where('idmun',$idmun)->restore();

        Session::flash('mensaje',"El municipio sido activado correctamente");

        return redirect()->route('reportes_municipios');
        
    }
    public function desactivar_municipios($idmun){
        $municipios=municipios::find($idmun);
        $municipios->delete();

        Session::flash('mensaje',"El municipio ha sido desactivado correctamente");

        return redirect()->route('reportes_municipios');
    }
    
    public function eliminar_municipios($idmun){
        $buscaodontologo = odontologos::where('idmun',$idmun)->get();
        $cuantos = count($buscaodontologo);
        if($cuantos==0)
        {
            $municipios=municipios::withTrashed()->find($idmun)->forceDelete();
            Session::flash('mensaje',"El municipio ha sido
                            borrado del sistema correctamente");

            return redirect()->route('reportes_municipios');
        }
        else{

            Session::flash('mensaje',"El municipio no se puede borrar del sistema porque
                            tiene registro en otras tablas");

            return redirect()->route('reportes_municipios');

        }
    }

}
