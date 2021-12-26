<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\status;
use App\Models\consultas;
use Session;

class StatusController extends Controller
{
  public function altastatus(){
    $consulta = status::orderBy('idstatus','DESC')
                           ->take(1)->get();
    $cuantos= count($consulta);
    if($cuantos==0){
    $idsigue = 1;
    }
    else{
    $idsigue = $consulta[0]->idstatus+1;
    }

    return view('Status/altastatus')
          ->with('idsigue',$idsigue);
  }

  public function guardarestatus(Request $request){
    $this->validate($request,[
      'nombre' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',

    ]);
    $statuses = new status;
    $statuses->idstatus = $request->idstatus;
    $statuses->nombre = $request->nombre;
    $statuses->save();

    Session::flash('mensaje',"El estatus ha sido registrado correctamente");
    return redirect()->route('reportestatus');
  }

  public function reportestatus(){
    $consulta = status::withTrashed()->select(['idstatus','nombre','deleted_at'])
    ->orderBy('statuses.nombre')
    ->get();
    //return $consulta;
    return view('Status/reportestatus')->with('consulta',$consulta);
  }

  public function desactivarstatus($idstatus){
    $statuses = status::find($idstatus);
    $statuses->delete();

    Session::flash('mensaje',"El estatus ha sido desactivado correctamente");
    return redirect()->route('reportestatus');
  }

  public function activarstatus($idstatus){
    $statuses = status::withTrashed()->where('idstatus',$idstatus)->restore();

    Session::flash('mensaje',"El estatus ha sido activado correctamente");
    return redirect()->route('reportestatus');
  }

  public function borrarstatus($idstatus){
    $buscastatus = consultas::where('idstatus',$idstatus)->get();
    $cuantos = count($buscastatus);
    if($cuantos==0){
    $statuses = status::withTrashed()->find($idstatus)->forceDelete();

    Session::flash('mensaje',"El estatus ha sido eliminado correctamente del sistema.");
    return redirect()->route('reportestatus');
  }else{
    Session::flash('mensaje',"No es posible eliminar el estatus");
    return redirect()->route('reportestatus');
  }
  }

  public function modificarstatus ($idstatus){
    $consulta = status::withTrashed()->select('idstatus','nombre')
    ->where('idstatus',$idstatus)
    ->get();
    return view('Status/modificarstatus')
    ->with('consulta',$consulta[0]);
  }

  public function guardacambioss (Request $request){
    $this->validate($request,[
      'nombre' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü,0-9]+$/',
    ]);
    $statuses = status::withTrashed()->find($request->idstatus);
    $statuses->idstatus = $request->idstatus;
    $statuses->nombre = $request->nombre;
    $statuses->save();

    Session::flash('mensaje',"El estatus ha sido modificado correctamente.");
    return redirect()->route('reportestatus');
}
}
