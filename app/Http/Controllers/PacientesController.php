<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pacientes;
use App\Models\tipo_sangres;
use App\Models\consulta_estudio;

use Session;
use PDF;
use DataTables;
use QrCode;
class PacientesController extends Controller
{

  public function pacientes(Request $request){
    if($request->ajax()){
        $data = pacientes::latest()->get();
        return DataTables::of($data)
          ->addIndexColumn()
          ->addColumn('otros', function($row){
              $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->idpaciente.'" data-original-title="Edit"
                class="edit btn btn-primary btn-sm editCustomer">Editar</a>';
              $btn = $btn. '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->idpaciente.'" data-original-title="Delete"
                class="btn btn-danger btn-sm deleteCustomer">Borrar</a>';
                return $btn;
          })
        ->rawColumns(['otros'])
        ->make(true);
      }

      return view('pacientes.reportepacientes');

      // $consulta = pacientes::all();
      // return $consulta;

    }

    public function store(Request $request){

    if($request->Customer_id != ''){
          pacientes::where('idpaciente', $request->Customer_id)->update([
            'nombre' => $request->nombre,
            'apellidop' => $request->apellidop,
            'apellidom' => $request->apellidom,
            'sexo' => $request->sexo,
            'edad' => $request->edad,
            'idtipossan' => $request->idtipossan,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'preguntaale' => $request->preguntaale,
            'alergias' => $request->alergias      
          ]);
        }
        else{
          pacientes::create($request->only('idpaciente','nombre','apellidop',
          'apellidom','sexo','edad','idtipossan',
          'telefono','correo','preguntaale','alergias'));
        }
        return response()->json(['success'=>'El paciente se guardo correctamente...!!!']);
      }

  /*   public function edit($idpaciente){
      $query = pacientes::find($idpaciente);
      return response()->json($query);
    }

    public function destroy($idpaciente){
      pacientes::find($idpaciente)->delete();
      return response()->json(['success'=>'El paciente se elimino correctamente...!!!']);
    }


    public function getPDFPacientes(){
        $consulta = pacientes::all();
        $pdf = PDF::loadView('pacientes.pdf', compact('consulta'));
        return $pdf->download('pdf_pacientes.pdf');
    } */

    public function export(){
        
      return $this->excel->download(new OdontologosExport, 'odontologos.xlsx');
    
  }

  public function import(){
    $this->excel->import(new OdontologosImport, request()->file('file'));
    return back();
  }

















    public function altapacientes()
    {
        $tipossan = tipo_sangres::all();
        $consulta = pacientes::withTrashed()->orderBy('idpaciente','DESC')->take(1)->get();
        $cuantos = count($consulta);
    if($cuantos==0)
    {
      $idesigue=1;
    }
    else
    {
      $idesigue = $consulta[0]->idpaciente + 1;
    }
        return view('pacientes.altapacientes', compact('tipossan'))
        ->with('idsigue',$idesigue);
    }
    public function index()
    {
        return view('index');
    }
    public function guardarpaciente(Request $request)
    {
        $this->validate($request,[
            'nombre'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,i,ó,ú,ü,Á,É,Í,Ó,Ú,Ü]+$/',
            'apellidop'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ñ,ó,ú,ü,Á,É,Í,Ó,Ú,Ü]+$/',
            'apellidom'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,i,ó,ú,ü,Á,É,Í,Ó,Ú,Ü]+$/',
            'edad'=> 'required|regex:/^[0-99]{2}+$/',
            'telefono'=> 'required|regex:/^[0-9]{10}$/',
            'correo'=> 'required|email',
            'idtipossan'=>'required',
            'alergias'=> 'regex:/^[A-Z,a-z, ,á,é,i,ó,ú,ü,Á,É,Í,Ó,Ú,Ü]+$/'
        ]);
        $pacientes = new pacientes;
        $pacientes ->idpaciente=$request->idpaciente;
        $pacientes ->nombre=$request->nombre;
        $pacientes ->apellidop=$request->apellidop;
        $pacientes ->apellidom=$request->apellidom;
        $pacientes ->edad=$request->edad;
        $pacientes ->sexo = $request->sexo;
        $pacientes ->telefono=$request->telefono;
        $pacientes ->correo=$request->correo;
        $pacientes ->idtipossan=$request->idtipossan;
        $pacientes->preguntaale = $request->preguntaale;
        $pacientes ->alergias=$request->alergias;
        $pacientes ->save(); 
      Session::flash('mensaje', "El empleado $request->nombre $request->apellidop ha sido dado de alta correctamente.");
      return redirect()->route('reportepacientes');
        
    }
     public function reportepacientes()
  {
    $consulta = pacientes::withTrashed()->
          select('pacientes.idpaciente','pacientes.nombre','pacientes.apellidop','pacientes.apellidom','pacientes.edad',
         'pacientes.telefono','pacientes.correo','pacientes.alergias','deleted_at')
          ->orderBy('pacientes.nombre')
          ->get();
          return view('pacientes.reportepacientes')->with('consulta',$consulta);
  }
  public function desactivapaciente($idpaciente)
  {
    $pacientes = pacientes::find($idpaciente);
    $pacientes->delete();
    Session::flash('mensaje', "El paciente ha sido desactivado correctamente.");
      return redirect()->route('reportepacientes');
  }
  public function activapaciente($idpaciente)
  {

    $pacientes = pacientes::withTrashed()->where('idpaciente',$idpaciente)->restore();
    Session::flash('mensaje', "El paciente ha sido activado correctamente.");
      return redirect()->route('reportepacientes');
  }
  public function borrarpaciente($idpaciente)
  {
    $buscapaciente=consulta_estudio::where('idpaciente',$idpaciente)->get();
    $cuantos = count($buscapaciente);
    if($cuantos==0)
    {
     $pacientes=pacientes::withTrashed()->find($idpaciente)->forceDelete();
     Session::flash('mensaje', "El paciente  ha sido borrado del sistema correctamente.");
    return redirect()->route('reportepacientes');
    }else{
      Session::flash('mensaje2', "El paciente no puede eliminarse del sistema porque esta en la tabla de estudios.");
    return redirect()->route('reportepacientes');
    }
   
  }
   
  public function modificapacientes($idpaciente){
    $consulta = pacientes::withTrashed()->join('tipo_sangres','pacientes.idtipossan','=','tipo_sangres.idtipossan')
    ->select('pacientes.idpaciente','pacientes.nombre','pacientes.apellidop','pacientes.apellidom','pacientes.edad',
         'pacientes.telefono','pacientes.sexo','pacientes.correo','tipo_sangres.idtipossan','tipo_sangres.tipo as tipossan','pacientes.preguntaale','pacientes.alergias',)
    ->where('idpaciente',$idpaciente)
    ->get();
    $tipo_sangres = tipo_sangres::all();
    return view('pacientes.modificapacientes')
    ->with('consulta',$consulta[0])
    ->with('tipo_sangres', $tipo_sangres);

  }

  public function guardacambiospaciente(Request $request){
    $this->validate($request,[
      'nombre'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,i,ó,ú,ü,Á,É,Í,Ó,Ú,Ü]+$/',
      'apellidop'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ñ,ó,ú,ü,Á,É,Í,Ó,Ú,Ü]+$/',
      'apellidom'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,i,ó,ú,ü,Á,É,Í,Ó,Ú,Ü]+$/',
      'edad'=> 'required|regex:/^[0-99]{2}+$/',
      'telefono'=> 'required|regex:/^[0-9]{10}$/',
      'correo'=> 'required|email',
      'idtipossan'=>'required',
      'alergias'=> 'regex:/^[A-Z,a-z, ,á,é,i,ó,ú,ü,Á,É,Í,Ó,Ú,Ü]+$/'

    ]);
     $pacientes = pacientes::withTrashed()->find($request->idpaciente);
     $pacientes ->idpaciente=$request->idpaciente;
     $pacientes ->nombre=$request->nombre;
     $pacientes ->apellidop=$request->apellidop;
     $pacientes ->apellidom=$request->apellidom;
     $pacientes ->edad=$request->edad;
     $pacientes ->sexo = $request->sexo;
     $pacientes ->telefono=$request->telefono;
     $pacientes ->correo=$request->correo;
     $pacientes ->idtipossan=$request->idtipossan;
     $pacientes ->preguntaale = $request->preguntaale;
     $pacientes ->alergias=$request->alergias;
     $pacientes ->save();
    Session::flash('mensaje', "El paciente $request->nombre $request->apellidop ha sido dado modificado correctamente.");
    return redirect()->route('reportepacientes');
  } 

}

