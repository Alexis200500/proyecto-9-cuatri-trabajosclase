<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\usuarios;
use App\Models\tipo_usuario;
use Session;
class UsuariosController extends Controller
{
    public function altausuarios()
    {
      
        $consulta = usuarios::withTrashed()->orderBy('idusuario','DESC')->take(1)->get();
        $cuantos = count($consulta);
         if($cuantos==0)
        {   
         $idesigue=1;
        }
         else
        {
      $idesigue = $consulta[0]->idusuario + 1;
        }
        $tipousuario = tipo_usuario::orderBy('tipo')->get();
        $tipousuario = tipo_usuario::orderBy('tipo')->get();
        return view('usuarios.altausuarios', compact('tipousuario'))
        ->with('idsigue',$idesigue)
        ->with('tipousuario',$tipousuario);
        
    }
    public function guardarusuario(Request $request)
    {
        $this->validate($request,[
            
            'nombre'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,i,ó,ú,ü,Á,É,Í,Ó,Ú,Ü,ñ]+$/',
            'apellidop'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,i,ó,ú,ü,Á,É,Í,Ó,Ú,Ü,ñ]+$/',
            'apellidom'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,i,ó,ú,ü,Á,É,Í,Ó,Ú,Ü,ñ]+$/',
            'edad'=> 'required|regex:/^[0-99]{2}+$/',
            'telefono'=> 'required|regex:/^[0-9]{10}$/',
            'correo'=> 'required|email',
            'idtipo_u' => 'required',
        ]);
        $usuario = new usuarios;
        $usuario ->idusuario=$request->idusuarios;
        $usuario ->nombre=$request->nombre;
        $usuario ->apellidop=$request->apellidop;
        $usuario ->apellidom=$request->apellidom;
        $usuario ->edad=$request->edad;
        $usuario ->sexo = $request->sexo;
        $usuario ->telefono=$request->telefono;
        $usuario ->correo=$request->correo;
        $usuario ->idtipo_u=$request->idtipo_u;
        
        $usuario ->save(); 
      Session::flash('mensaje', "El usuario $request->nombre $request->apellidop ha sido dado de alta correctamente.");
      return redirect()->route('reporteusuarios');
    }
      public function reporteusuarios()
  {
   $consulta = usuarios::withTrashed()->join('tipo_usuarios','usuarios.idtipo_u','=','tipo_usuarios.idtipo_u')
          ->select('usuarios.idusuario','usuarios.nombre','usuarios.apellidom','tipo_usuarios.tipo as tipo','usuarios.deleted_at','usuarios.apellidop','usuarios.telefono','usuarios.edad','usuarios.correo')
          ->orderBy('usuarios.nombre')
          ->get();
          return view('usuarios.reporteusuarios')->with('consulta',$consulta);
  }
  public function desactivausuario($idusuario)
  {

    $usuario = usuarios::find($idusuario);
    $usuario->delete();
    Session::flash('mensaje', "El usuario ha sido desactivado correctamente.");
      return redirect()->route('reporteusuarios');
  }
  public function activausuario($idusuario)
  {

    $usuario = usuarios::withTrashed()->where('idusuario',$idusuario)->restore();
    Session::flash('mensaje', "El usuario ha sido activado correctamente.");
      return redirect()->route('reporteusuarios');
  }
  public function borrarusuario($idusuario)
  {
    $usuario = usuarios::withTrashed()->find($idusuario)->forceDelete();
     Session::flash('mensaje', "El usuario ha sido eliminado correctamente del sistema.");
      return redirect()->route('reporteusuarios');
  }
  public function modificausuario($idusuario)
  {
     $consulta = usuarios::withTrashed()->join('tipo_usuarios','usuarios.idtipo_u','=','tipo_usuarios.idtipo_u')
          ->select('usuarios.idusuario','usuarios.nombre','usuarios.apellidom','tipo_usuarios.tipo as tipo',
          'usuarios.apellidop',
          'usuarios.telefono','usuarios.edad','usuarios.sexo', 'usuarios.correo','usuarios.idtipo_u')
    ->where('idusuario',$idusuario)
    ->get();
    $tipo_usuarios = tipo_usuario::all();
    return view('usuarios.modificausuario')
    ->with('consulta',$consulta[0])
    ->with('tipo_usuarios', $tipo_usuarios);
  }
   public function guardacambiosusuario(Request $request){
    $this->validate($request,[
      'nombre'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,i,ó,ú,ü,Á,É,Í,Ó,Ú,Ü,ñ]+$/',
      'apellidop'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,i,ó,ú,ü,Á,É,Í,Ó,Ú,Ü,ñ]+$/',
      'apellidom'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,i,ó,ú,ü,Á,É,Í,Ó,Ú,Ü,ñ]+$/',
      'edad'=> 'required|regex:/^[0-99]{2}+$/',
      'telefono'=> 'required|regex:/^[0-9]{10}$/',
      'correo'=> 'required|email',
      'idtipo_u' => 'required',

    ]);
      $usuario = usuarios::withTrashed()->find($request->idusuario);
      $usuario ->idusuario=$request->idusuario;
      $usuario ->nombre=$request->nombre;
      $usuario ->apellidop=$request->apellidop;
      $usuario ->apellidom=$request->apellidom;
      $usuario ->edad=$request->edad;
      $usuario ->sexo = $request->sexo;
      $usuario ->telefono=$request->telefono;
      $usuario ->correo=$request->correo;
      $usuario ->idtipo_u=$request->idtipo_u;
      $usuario ->save();
    Session::flash('mensaje', "El usuario $request->nombre $request->apellidop ha sido dado modificado correctamente.");
    return redirect()->route('reporteusuarios');
  } 
}
