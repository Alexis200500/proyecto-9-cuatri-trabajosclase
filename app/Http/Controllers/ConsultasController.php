<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\consulta;
use App\Models\status;
use App\Models\pacientes;
use App\Models\odontologos;
use Session;

class ConsultasController extends Controller
{
  public function altaconsulta(){
    $consulta = consulta::withTrashed()->orderBy('idconsulta','DESC')
                           ->take(1)->get();
    $cuantos= count($consulta);
    if($cuantos==0){
    $idsigue = 1;
    }
    else{
    $idsigue = $consulta[0]->idconsulta+1;
    }

    $statuses = status::orderBy('nombre')->get();
    $pacientes = pacientes::orderBy('nombre')->get();
    $odontologos = odontologos::orderBy('nombre')->get();

    return view('Consultas/altaconsulta')
          ->with('idsigue',$idsigue)
          ->with('statuses',$statuses)
          ->with('pacientes',$pacientes)
          ->with('odontologos',$odontologos);
  }

  public function guardarconsulta(Request $request){
    $this->validate($request,[
      'fecha_consulta' => 'required|date',
      'hora_consulta' => 'required|regex:/^[0-9]+[:][0-9]+[ ][a-z]{2}$/',
      'peso' => 'required|regex:/^[0-9]+[.][0-9]+[ ][k][g]$/',
      'estatura' => 'required|regex:/^[0-9]{1}[.][0-9]{2}$/',
      'costo' => 'required|regex:/^[$][0-9]+[.,0-9]*$/',
    ]);
    $consultas = new consulta;
    $consultas->idconsulta = $request->idconsulta;
    $consultas->idpaciente = $request->idpaciente;
    $consultas->idodo = $request->idodo;
    $consultas->fecha_consulta = $request->fecha_consulta;
    $consultas->hora_consulta = $request->hora_consulta;
    $consultas->peso = $request->peso;
    $consultas->estatura = $request->estatura;
    $consultas->costo = $request->costo;
    $consultas->idstatus = $request->idstatus;
    $consultas->save();

    Session::flash('mensaje',"La consulta ha sido registrada correctamente");
    return redirect()->route('reporteconsultas');
  }

  public function reporteconsultas(){
    $consulta = consulta::withTrashed()->join('pacientes','consultas.idpaciente','=','pacientes.idpaciente')
                           ->join('odontologos','consultas.idodo','=','odontologos.idodo')
    ->select('consultas.idconsulta','consultas.fecha_consulta','consultas.hora_consulta','consultas.costo',
             'pacientes.nombre as paci','pacientes.apellidop','pacientes.apellidom',
             'odontologos.nombre as odo', 'odontologos.appaterno','odontologos.apmaterno','consultas.deleted_at')
    ->orderBy('pacientes.nombre')
    ->get();
    return view('Consultas/reporteconsultas')->with('consulta',$consulta);
  }

  public function desactivaconsulta($idconsulta){
    $consultas = consultas::find($idconsulta);
    $consultas->delete();

    Session::flash('mensaje',"La consulta ha sido desactivada correctamente");
    return redirect()->route('reporteconsultas');

  }

  public function activarconsulta($idconsulta){
    $consultas = consulta::withTrashed()->where('idconsulta',$idconsulta)->restore();

    Session::flash('mensaje',"La consulta ha sido activada correctamente");
    return redirect()->route('reporteconsultas');
  }

  public function borraconsulta($idconsulta){
    $consultas = consulta::withTrashed()->find($idconsulta)->forceDelete();

    Session::flash('mensaje',"La consulta ha sido borrada correctamente del sistema");
    return redirect()->route('reporteconsultas');
  }

  public function modificarconsulta ($idconsulta){
    $consulta = consulta::withTrashed()->join('pacientes','consultas.idpaciente','=','pacientes.idpaciente')
                           ->join('odontologos','consultas.idodo','=','odontologos.idodo')
                           ->join('statuses','consultas.idstatus','=','statuses.idstatus')
    ->select('consultas.idconsulta','consultas.fecha_consulta','consultas.hora_consulta','consultas.costo',
             'pacientes.nombre as paci','pacientes.apellidop','pacientes.apellidom','consultas.idpaciente','consultas.peso','consultas.estatura',
             'odontologos.nombre as odo','odontologos.appaterno','odontologos.apmaterno', 'consultas.idodo','statuses.nombre as stat','consultas.idstatus')
    ->where('idconsulta',$idconsulta)
    ->get();
    $pacientes = pacientes::all();
    $odontologos = odontologos::all();
    $statuses = status::all();
    return view ('Consultas/modificarconsulta')
    ->with('consulta',$consulta[0])
    ->with('pacientes',$pacientes)
    ->with('odontologos',$odontologos)
    ->with('statuses',$statuses);
  }

  public function guardacambios (Request $request){
    $this->validate($request,[
      'fecha_consulta' => 'required|date',
      'hora_consulta' => 'required|regex:/^[0-9]+[:][0-9]+[ ][a-z]{2}$/',
      'peso' => 'required|regex:/^[0-9]+[.][0-9]+[ ][k][g]$/',
      'estatura' => 'required|regex:/^[0-9]{1}[.][0-9]{2}$/',
      'costo' => 'required|regex:/^[$][0-9]+[.,0-9]*$/',
    ]);
    $consultas = consulta::withTrashed()->find($request->idconsulta);
    $consultas->idconsulta = $request->idconsulta;
    $consultas->idpaciente = $request->idpaciente;
    $consultas->idodo = $request->idodo;
    $consultas->fecha_consulta = $request->fecha_consulta;
    $consultas->hora_consulta = $request->hora_consulta;
    $consultas->peso = $request->peso;
    $consultas->estatura = $request->estatura;
    $consultas->costo = $request->costo;
    $consultas->idstatus = $request->idstatus;
    $consultas->save();

    Session::flash('mensaje',"La consulta ha sido modificada correctamente");
    return redirect()->route('reporteconsultas');
  }
}
