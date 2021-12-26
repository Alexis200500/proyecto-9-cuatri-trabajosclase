<?php

namespace App\Http\Controllers;




use Illuminate\Http\Request;

use App\Exports\OdontologosExport;
use App\Imports\OdontologosImport;
use Maatwebsite\Excel\Excel;


use App\Models\odontologos;
use App\Models\municipios;
use App\Models\especialidades;
use App\Models\consultas;
use Session;
use PDF;
use DataTables;
use QrCode;



class OdontologosController extends Controller
{   
  private $excel;
  public function __construct(Excel $excel){
    $this->excel = $excel;
  }


    public function odontologos(Request $request){
        if($request->ajax()){
            $data = odontologos::latest()->get();
            return DataTables::of($data)
              ->addIndexColumn()
              ->addColumn('otros', function($row){
                  $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->idodo.'" data-original-title="Edit"
                    class="edit btn btn-primary btn-sm editCustomer">Editar</a>';
                  $btn = $btn. '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->idodo.'" data-original-title="Delete"
                    class="btn btn-danger btn-sm deleteCustomer">Borrar</a>';
                    return $btn;
              })
            ->rawColumns(['otros'])
            ->make(true);
          }
          return view('odontologos.reportes');
    }

    public function store(Request $request){

      if($request->Customer_id !='' ){

        if($request->file('img1') !=''){
          $file = $request->file('img1');
          $img1 = $file->getClientOriginalName();
          // $name = $request->file('img1')->getClientOriginalName();
          $ldate = date('Ymd_His_');
            $img2 = $ldate . $img1;
          \Storage::disk('local')->put($img2, \File::get($file));
        }
        else{
          $img2 = $request->$img2;
        }

      odontologos::where('idodo', $request->Customer_id)->update([
        'nombre' => $request->nombre,
            'appaterno' => $request->appaterno,
            'apmaterno' => $request->apmaterno,
            'sexo' => $request->sexo,
            'edad' => $request->edad,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'password' => $request->password,
            'calle' => $request->calle,
            'numint' => $request->numint,
            'numext' => $request->numext,
            'idmun' => $request->idmun,
            'colonia' => $request->colonia,
            'img' => $img2,
            'idesp' => $request->idesp,
            'hora_entrada' => $request->hora_entrada,
            'hora_salida' => $request->hora_salida

      ]);
      }
      else{
        // Alumnos::create($request->only('matricula','nombre','app','gen','fn','email','pass'));
        if($request->file('img1') !=''){
          $file = $request->file('img1');
          $img1 = $file->getClientOriginalName();
          // $name = $request->file('img1')->getClientOriginalName();
          $ldate = date('Ymd_His_');
            $img2 = $ldate . $img1;
          \Storage::disk('local')->put($img2, \File::get($file));
        }
        else{
          //$img2 = $request->img2;
          $img2 = "sinfoto.jpg";
        }
        odontologos::create(array(
          // 'matricula'=>$request->input('matricula'),
          // 'nombre'=>$request->input('nombre'),
          // 'app'=>$request->input('app'),
          // 'gen'=>$request->input('gen'),
          // 'fn'=>$request->input('fn'),
          // 'img'=>$img2,
          // 'email'=>$request->input('email'),
          // 'pass'=>$request->input('pass'),


          'nombre' => $request->input('nombre'),
          'appaterno' => $request->input('appaterno'),
          'apmaterno' => $request->input('apmaterno'),
          'sexo' => $request->input('sexo'),
          'edad' => $request->input('edad'),
          'telefono' => $request->input('telefono'),
          'correo' => $request->input('correo'),
          'password' => $request->input('password'),
          'calle' => $request->input('calle'),
          'numint' => $request->input('numint'),
          'numext' => $request->input('numext'),
          'idmun' => $request->input('idmun'),
          'colonia' => $request->input('colonia'),
          'img' => $img2,
          'idesp' => $request->input('idesp'),
          'hora_entrada' => $request->input('hora_entrada'),
          'hora_salida' => $request->input('hora_salida')



        ));
      }
      return response()->json(['success'=>'El odontologo se guardo correctamente']);








      /*   if($request->Customer_id != ''){
          odontologos::where('idodo', $request->Customer_id)->update([
            'nombre' => $request->nombre,
            'appaterno' => $request->appaterno,
            'apmaterno' => $request->apmaterno,
            'sexo' => $request->sexo,
            'edad' => $request->edad,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'password' => $request->password,
            'calle' => $request->calle,
            'numint' => $request->numint,
            'numext' => $request->numext,
            'idmun' => $request->idmun,
            'colonia' => $request->colonia,
            // 'img' => $request->$img2,
            'idesp' => $request->idesp,
            'hora_entrada' => $request->hora_entrada,
            'hora_salida' => $request->hora_salida
          ]);
        }
        else{
          odontologos::create($request->only('idodo','nombre','appaterno',
          'apmaterno','sexo','edad',
          'telefono','correo','password','calle',
          'numint','numext','idmun','colonia',
          // 'img',
          'idesp','hora_entrada','hora_salida'));
        }
        return response()->json(['success'=>'El odontologo se guardo correctamente...!!!']); */
      }

    public function edit($id){
      $query = odontologos::find($id);
      return response()->json($query);
    }

    public function destroy($id){
      odontologos::find($id)->delete();
      return response()->json(['success'=>'El odontologo se elimino correctamente...!!!']);
    }


    public function getPDFOdontologos(){
        $consulta = odontologos::all();
        $pdf = PDF::loadView('odontologos.pdf', compact('consulta'));
        return $pdf->download('pdf_odontologos.pdf');
    }

    public function export(){
        
      return $this->excel->download(new OdontologosExport, 'odontologos.xlsx');
    
  }

  public function import(){
    $this->excel->import(new OdontologosImport, request()->file('file'));
    return back();
  }

  public function QrCode()
  {
    return \QrCode::size(300)
        ->backgroundColor(255,255,255,0)
        ->generate('Practica de codigo QR - |IDGS-93||||');
  }

  public function QrImg()
      {
        $img = \QrCode::format('png')
          ->merge('img/laravel.png', 0.5, true)
          ->size(500)->errorCorrection('H')
          ->generate('Ejemplo de Código QR - |IDGS-93||||');
        return responser($img)->header('Content-type','image/png'); 
      }








    public function alta_odontologos(){
        $consulta = odontologos::orderBy('idodo','DESC')
            ->take(1)->get();

        $cuantos = count($consulta);
        if ($cuantos==0) {
            $idesigue = 1;
        } else {
            $idesigue = $consulta[0]->idodo + 1;
        }

        $municipios = municipios::orderBy('nombre')->get();
        $especialidades = especialidades::orderBy('especialidad')->get();

        return view('plantilla')
            ->with('idesigue',$idesigue)
            ->with('municipios',$municipios)
            ->with('especialidades',$especialidades);
    }

    public function guardar_odontologos(Request $request){

        $this->validate($request,[
            'nombre'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
            'appaterno'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
            'apmaterno'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
            'edad'=> 'required|regex:/^[0-9]{2}$/',
            'telefono'=> 'required|regex:/^[0-9]{10}$/',
            'correo'=> 'required|email',
            'password'=> 'required|alpha_num',
            'calle'=> 'required|regex:/^[A-Z]*[A-Z,a-z,0-9, ,á,é,í,ó,ú,ü]+$/',
            'numint'=> 'required|regex:/^[A-Z]*[A-Z,a-z,0-9, ,á,é,í,ó,ú,ü]+$/',
            'numext'=> 'required|regex:/^[A-Z]*[A-Z,a-z,0-9, ,á,é,í,ó,ú,ü]+$/',
            'colonia'=> 'required|regex:/^[A-Z]*[A-Z,a-z,0-9, ,á,é,í,ó,ú,ü,]+$/',
            'hora_entrada'=> 'required',
            'hora_salida'=> 'required',
            'img'=>'image|mimes:gif,jpeg,png'
        ]);

            $file = $request->file('img');
              if($file<>""){
                $img = $file->getClientOriginalName();
                $img2 = $request->idodo . $img;
                \Storage::disk('local')->put($img2, \File::get($file));
              }
              else{
                $img2 = "sinfoto.jpg";
              }

        $odontologos = new odontologos;
        $odontologos->idodo = $request->idodo;
        $odontologos->nombre = $request->nombre;
        $odontologos->appaterno = $request->appaterno;
        $odontologos->apmaterno = $request->apmaterno;
        $odontologos->sexo = $request->sexo;
        $odontologos->edad = $request->edad;
        $odontologos->telefono = $request->telefono;
        $odontologos->correo = $request->correo;
        $odontologos->password = $request->password;
        $odontologos->calle = $request->calle;
        $odontologos->numint = $request->numint;
        $odontologos->numext = $request->numext;
        $odontologos->idmun = $request->idmun;
        $odontologos->colonia = $request->colonia;
        $odontologos->idesp = $request->idesp;
        $odontologos->hora_entrada = $request->hora_entrada;
        $odontologos->hora_salida = $request->hora_salida;
        $odontologos->img = $img2;
        $odontologos->save();

        // return $request;
            Session::flash('mensaje',"El Odontologo $request->nombre sido creado correctamente");

            return redirect()->route('odontologos');


    }

  /*   public function reportes_odontologos(){
        $consulta = odontologos::withTrashed()->join('municipios','odontologos.idmun','=','municipios.idmun')
        ->join('especialidades','odontologos.idesp','=','especialidades.idesp')
        ->select('odontologos.idodo','odontologos.nombre','odontologos.appaterno','odontologos.apmaterno',
        'odontologos.sexo','odontologos.edad','odontologos.telefono','odontologos.correo',
        'odontologos.password','odontologos.calle','odontologos.numint','odontologos.numext','odontologos.colonia',
        'odontologos.hora_entrada','odontologos.hora_salida',
        'municipios.nombre as municipio','especialidades.especialidad as esp', 'odontologos.deleted_at','odontologos.img')
        ->orderBy('odontologos.appaterno','asc')
        ->get();

        // return $consulta;
        return view('odontologos.reportes')
            -> with('consulta',$consulta);
    } */

    public function desactivar_odontologos($idodo){
        $odontologos=odontologos::find($idodo);
        $odontologos->delete();

        Session::flash('mensaje',"El odontologo ha sido desactivado correctamente");

        return redirect()->route('reportes_odontologos');
    }

    public function activar_odontologos($idodo){
        $odontologos=odontologos::withTrashed()->where('idodo',$idodo)->restore();

        Session::flash('mensaje',"El odontologo sido activado correctamente");

        return redirect()->route('reportes_odontologos');

    }

    public function eliminar_odontologos($idodo){
        $buscaconsultas = consultas::where('idodo',$idodo)->get();
        $cuantos = count($buscaconsultas);
        if($cuantos==0)
        {
            $odontologos=odontologos::withTrashed()->find($idodo)->forceDelete();
            Session::flash('mensaje',"El odontologo ha sido eliminado del sistema correctamente");

            return redirect()->route('reportes_odontologos');
        }
        else{

            Session::flash('mensaje',"El odontologo no se puede eliminar por que tiene
                                        registros en otras tablas");

            return redirect()->route('reportes_odontologos');

        }
    }

    public function modifica_odontologos($idodo){

        $consulta = odontologos::withTrashed()->join('municipios','odontologos.idmun','=','municipios.idmun')
                                              ->join('especialidades','odontologos.idesp','=','especialidades.idesp')
                    ->select('odontologos.idodo','odontologos.nombre','odontologos.appaterno','odontologos.apmaterno',
                             'odontologos.sexo','odontologos.edad','odontologos.telefono','odontologos.correo',
                             'odontologos.password','odontologos.calle','odontologos.numint','odontologos.numext','municipios.nombre as m',
                             'odontologos.colonia','especialidades.especialidad as especi','odontologos.hora_entrada','odontologos.hora_salida',
                             'odontologos.idmun','odontologos.idesp','odontologos.img')
                    ->where('idodo',$idodo)
                    ->get();

                    $municipios = municipios::all();
                    $especialidades = especialidades::all();


        // $consulta = medicamentos::withTrashed()->join('tipo_medicamentos','medicamentos.idtipomed','=','tipo_medicamentos.idtipomed')
        // ->select('medicamentos.idmed','medicamentos.nombre','tipo_medicamentos.tipo as tm','medicamentos.presentacion',
        //         'medicamentos.susta_activa','medicamentos.idtipomed')
        // ->where('idmed',$idmed)
        // ->get();

        //  $tipo_medicamentos = tipo_medicamentos::all();
         return view('odontologos.modifica')
        ->with('consulta',$consulta[0])
        ->with('municipios',$municipios)
        ->with('especialidades',$especialidades);
    }

    public function cambio_odontologos(Request $request){
        $this->validate($request,[
            'nombre'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
            'appaterno'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
            'apmaterno'=> 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
            'edad'=> 'required|regex:/^[0-9]{2}$/',
            'telefono'=> 'required|regex:/^[0-9]{10}$/',
            'correo'=> 'required|email',
            'password'=> 'required|alpha_num',
            'calle'=> 'required|regex:/^[A-Z]*[A-Z,a-z,0-9, ,á,é,í,ó,ú,ü]+$/',
            'numint'=> 'required|regex:/^[A-Z]*[A-Z,a-z,0-9, ,á,é,í,ó,ú,ü]+$/',
            'numext'=> 'required|regex:/^[A-Z]*[A-Z,a-z,0-9, ,á,é,í,ó,ú,ü]+$/',
            'colonia'=> 'required|regex:/^[A-Z]*[A-Z,a-z,0-9, ,á,é,í,ó,ú,ü,]+$/',
            'hora_entrada'=> 'required',
            'hora_salida'=> 'required',
            'img'=>'image|mimes:gif,jpeg,png'
        ]);

        $file = $request->file('img');
        if($file<>""){
        $img = $file->getClientOriginalName();
        $img2 = $request->ide . $img;
        \Storage::disk('local')->put($img2, \File::get($file));
        }

        $odontologos = odontologos::withTrashed()->find($request->idodo);
        $odontologos->idodo = $request->idodo;
        $odontologos->nombre = $request->nombre;
        $odontologos->appaterno = $request->appaterno;
        $odontologos->apmaterno = $request->apmaterno;
        $odontologos->sexo = $request->sexo;
        $odontologos->edad = $request->edad;
        $odontologos->telefono = $request->telefono;
        $odontologos->correo = $request->correo;
        $odontologos->password = $request->password;
        $odontologos->calle = $request->calle;
        $odontologos->numint = $request->numint;
        $odontologos->numext = $request->numext;
        $odontologos->idmun = $request->idmun;
        $odontologos->colonia = $request->colonia;
        $odontologos->idesp = $request->idesp;
        $odontologos->hora_entrada = $request->hora_entrada;
        $odontologos->hora_salida = $request->hora_salida;
        if($file<>""){
        $odontologos->img = $img2;
        }
        $odontologos->save();


        // dd($request);

        Session::flash('mensaje',"El odontologo $request->nombre $request->appaterno ha sido modificado");

        return redirect()->route('reportes_odontologos');
      }

      public function download($img){
        $pathtoFile = public_path().'//archivos/'. $img;
        return response()->download($pathtoFile);
      }
}
