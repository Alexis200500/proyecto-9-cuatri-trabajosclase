<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tratamientos;
use Session;

class TratamientosController extends Controller
{
    public function altatratamiento(){
      $consulta = tratamientos::orderBy('idtratamiento','DESC')
                             ->take(1)->get();
      $cuantos= count($consulta);
      if($cuantos==0){
      $idsigue = 1;
      }
      else{
      $idsigue = $consulta[0]->idtratamiento+1;
      }

      return view('Tratamientos/altatratamiento')
            ->with('idsigue',$idsigue);
    }

    public function guardartratamiento(Request $request){
      $this->validate($request,[
        'nombre' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
        'duracion' => 'required|regex:/^[A-Z,0-9][A-Z,a-z, ,á,é,í,ó,ú,ü,ñ]+$/',
        'medicamento' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
        'precio' => 'required|regex:/^[$][0-9]+[.,0-9]*$/',
      ]);
      $tratamientos = new tratamientos;
      $tratamientos->idtratamiento = $request->idtratamiento;
      $tratamientos->nombre = $request->nombre;
      $tratamientos->duracion = $request->duracion;
      $tratamientos->medicamento = $request->medicamento;
      $tratamientos->precio = $request->precio;
      $tratamientos->save();

      Session::flash('mensaje',"El tratamiento ha sido registrado correctamente");
      return redirect()->route('reportetratamientos');
    }

    public function reportetratamientos(){
      $consulta = tratamientos::withTrashed()->select(['idtratamiento','nombre','duracion','medicamento','precio','deleted_at'])
      ->orderBy('tratamientos.nombre')
      ->get();
      //return $consulta;
      return view('Tratamientos/reportetratamientos')->with('consulta',$consulta);
    }

    public function desactivartratamiento($idtratamiento){
      $tratamientos = tratamientos::find($idtratamiento);
      $tratamientos->delete();

      Session::flash('mensaje',"El tratamiento ha sido desactivado correctamente");
      return redirect()->route('reportetratamientos');
    }

    public function activartratamiento($idtratamiento){
      $tratamientos = tratamientos::withTrashed()->where('idtratamiento',$idtratamiento)->restore();

      Session::flash('mensaje',"El tratamiento ha sido activado correctamente");
      return redirect()->route('reportetratamientos');
    }

    public function borrartratamiento($idtratamiento){
      $tratamientos = tratamientos::withTrashed()->find($idtratamiento)->forceDelete();

      Session::flash('mensaje',"El tratamiento ha sido eliminado correctamente del sistema");
      return redirect()->route('reportetratamientos');
    }

    public function modificartratamiento ($idtratamiento){
      $consulta = tratamientos::withTrashed()->select('idtratamiento','nombre','duracion','medicamento','precio')
      ->where('idtratamiento',$idtratamiento)
      ->get();
      return view('Tratamientos/modificartratamientos')
      ->with('consulta',$consulta[0]);
    }

    public function guardacambiost (Request $request){
      $this->validate($request,[
        'nombre' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
        'duracion' => 'required|regex:/^[A-Z,0-9][A-Z,a-z, ,á,é,í,ó,ú,ü,ñ]+$/',
        'medicamento' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
        'precio' => 'required|regex:/^[$][0-9]+[.,0-9]*$/',
      ]);
      $tratamientos = tratamientos::withTrashed()->find($request->idtratamiento);
      $tratamientos->idtratamiento = $request->idtratamiento;
      $tratamientos->nombre = $request->nombre;
      $tratamientos->duracion = $request->duracion;
      $tratamientos->medicamento = $request->medicamento;
      $tratamientos->precio = $request->precio;
      $tratamientos->save();

      Session::flash('mensaje',"El tratamiento ha sido modificado correctamente");
      return redirect()->route('reportetratamientos');
  }
}
