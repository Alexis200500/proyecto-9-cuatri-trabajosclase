<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Models\estudio;
use\App\Models\consulta_estudio;
use Session;

class EstudiosController extends Controller
{
    public function altaestudios()
    {
        $consulta =estudio::withTrashed()->orderBy('idestudio','DESC')->take(1)->get();
        $cuantos = count($consulta);
    if($cuantos==0)
    {
      $idesigue=1;
    }
    else
    {
      $idesigue = $consulta[0]->idestudio + 1;
    }
        return view('estudios.altaestudios')
        ->with('idsigue',$idesigue);
    }
    public function guardarestudios(Request $request)
    {
        $this->validate($request,[
            'idestudio'=>'required|numeric',
            'nombree'=> 'required|regex:/^[A-Z,a-z, ,á,é,í,ó,ú,ü,Á,É,Í,Ó,Ú,Ü]+$/',
            'tipoes'=>'required|regex:/^[A-Z,a-z, ,á,é,i,ó,ú,ü,Á,É,Í,Ó,Ú,Ü]+$/',

        ]);
        echo "Todo correcto";
        $estudio= new estudio;
        $estudio->idestudio=$request->idestudio;
        $estudio->nombre=$request->nombree;
        $estudio->tipo=$request->tipoes;
        $estudio->save();
        Session::flash('mensaje', "$request->nombree ha sido dado de alta correctamente.");
        return redirect()->route('reporteestudio');
    }
    public function reporteestudio()
    {
        $consulta = estudio::withTrashed()->select('estudios.idestudio','estudios.nombre','estudios.tipo','estudios.deleted_at')
        ->orderBy('estudios.nombre')
        ->get();
        return view('estudios.reporteestudio')->with('consulta',$consulta);
    }
    public function desactivaestudio($idestudio)
  {
    $estudio = estudio::find($idestudio);
    $estudio->delete();
    Session::flash('mensaje', "El estudio ha sido desactivado correctamente.");
      return redirect()->route('reporteestudio');
  }
  public function activaestudio($idestudio)
  {

    $estudio = estudio::withTrashed()->where('idestudio',$idestudio)->restore();
    Session::flash('mensaje', "El estudio ha sido activado correctamente.");
      return redirect()->route('reporteestudio');
  }
  public function borrarestudio($idestudio)
  {
    $buscaestudio=consulta_estudio::where('idestudio',$idestudio)->get();
    $cuantos = count($buscaestudio);
    if($cuantos==0)
    {
     $estudio=estudio::withTrashed()->find($idestudio)->forceDelete();
     Session::flash('mensaje', "El estudio ha sido borrado del sistema correctamente.");
    return redirect()->route('reporteestudio');
    }else{
      Session::flash('mensaje2', "El estudio no puede eliminarse del sistema porque esta en la tabla de consulta estudios.");
    return redirect()->route('reporteestudio');
    }
  }
  public function modificaestudio($idestudio){
    $consulta = estudio::withTrashed()->select('estudios.idestudio','estudios.nombre','estudios.tipo')
    ->where('idestudio',$idestudio)
    ->get();
    return view('estudios.modificaestudio')
    ->with('consulta',$consulta[0]);

  }

  public function guardacambiosestudio(Request $request){
    $this->validate($request,[
     'idestudio'=>'required|numeric',
      'nombree'=> 'required|regex:/^[A-Z,a-z, ,á,é,í,ó,ú,ü,Á,É,Í,Ó,Ú,Ü]+$/',
      'tipoes'=>'required|regex:/^[A-Z,a-z, ,á,é,i,ó,ú,ü,Á,É,Í,Ó,Ú,Ü]+$/',

    ]);
     $estudio = estudio::withTrashed()->find($request->idestudio);
     $estudio->idestudio=$request->idestudio;
     $estudio->nombre=$request->nombree;
     $estudio->tipo=$request->tipoes;
     $estudio ->save();
    Session::flash('mensaje', "El estudio $request->tipoes ha sido dado modificado correctamente.");
    return redirect()->route('reporteestudio');
  } 

    
}
