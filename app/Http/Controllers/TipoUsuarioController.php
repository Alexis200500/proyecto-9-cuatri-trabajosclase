<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tipo_usuario;
use App\Models\pacientes;
use Session;
class TipoUsuarioController extends Controller
{
    public function altatipousuario()
    {
        $consulta = tipo_usuario::withTrashed()->orderBy('idtipo_u','DESC')->take(1)->get();
        $cuantos = count($consulta);
    if($cuantos==0)
    {
      $idesigue=1;
    }
    else
    {
      $idesigue = $consulta[0]->idtipo_u + 1;
    }
        return View('tipousuario.altatipousuario')
         ->with('idsigue',$idesigue);
    }
    public function guardartipou(Request $request)
    {
         $this->validate($request,[
             'idtipo'=>'required|numeric',
             'tipo'=>'required|regex:/^[A-Z][A-Z,a-z, ,á,é,i,ó,ú,ü,Á,É,Í,Ó,Ú,Ü]+$/',
         ]);
        $tipousuario = new tipo_usuario;
        $tipousuario ->idtipo_u=$request->idtipo;
        $tipousuario ->tipo=$request->tipo;
        $tipousuario->save();
        Session::flash('mensaje', "El tipo  $request->tipo ha sido dado de alta correctamente.");
        return redirect()->route('reportetipousuario');
    }
    public function reportetipousuario()
  {
   $consulta = tipo_usuario::withTrashed()->
           select('tipo_usuarios.idtipo_u','tipo_usuarios.tipo','tipo_usuarios.deleted_at')
          ->orderBy('tipo_usuarios.tipo')
          ->get();
          return view('tipousuario.reportetipousuarios')->with('consulta',$consulta);
  }
  public function desactivatipousuario($idtipo_u)
  {
    $tipo_u = tipo_usuario::find($idtipo_u);
    $tipo_u->delete();
    Session::flash('mensaje', "El tipo de usuario ha sido desactivado correctamente.");
      return redirect()->route('reportetipousuario');
  }
  public function activatipousuario($idtipo_u)
  {

    $tipo_u = tipo_usuario::withTrashed()->where('idtipo_u',$idtipo_u)->restore();
    Session::flash('mensaje', "El tipo de usuario ha sido activado correctamente.");
      return redirect()->route('reportetipousuario');
  }
  public function borrartipousuario($idtipo_u)
  {
    $buscatipo_u=pacientes::where('idtipossan',$idtipo_u)->get();
    $cuantos = count($buscatipo_u);
    if($cuantos==0)
    {
     $tipo_u=tipo_usuario::withTrashed()->find($idtipo_u)->forceDelete();
     Session::flash('mensaje', "El tipo de usuario ha sido borrado del sistema correctamente.");
    return redirect()->route('reportetipousuario');
    }else{
      Session::flash('mensaje2', "El tipo de usuario no puede eliminarse porque un usuario ocupa este tipo.");
    return redirect()->route('reportetipousuario');
    }
  }
  public function modificatipousuario($idtipo_u)
  {

    $consulta = tipo_usuario::withTrashed()->
    select('tipo_usuarios.idtipo_u','tipo_usuarios.tipo')
    ->where('idtipo_u',$idtipo_u)
    ->get();
    $tipo_u = tipo_usuario::all();
    return view('tipousuario.modificatipousuario')
    ->with('consulta',$consulta[0])
    ->with('tipo_usuarios', $tipo_u);
  }
  public function guardacambiostipousuario(Request $request){
    $this->validate($request,[
      
      'tipo'=>'required|regex:/^[A-Z][A-Z,a-z, ,á,é,i,ó,ú,ü,Á,É,Í,Ó,Ú,Ü]+$/',

    ]);
    $tipo_u = tipo_usuario::withTrashed()->find($request->idtipo_u);
    $tipo_u ->idtipo_u=$request->idtipo_u;
    $tipo_u ->tipo=$request->tipo;
    
     $tipo_u ->save();
    Session::flash('mensaje', "El tipo $request->tipo ha sido dado modificado correctamente.");
    return redirect()->route('reportetipousuario');
  }
  
}

