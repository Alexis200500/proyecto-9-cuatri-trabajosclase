<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\odontologossin;
use App\Models\municipios;
use App\Models\especialidades;
use App\Models\consultas;
use Session;
use PDF;
use DataTables;
use QrCode;


class odontologossinController extends Controller
{
    public function odontologossin(Request $request){
        if($request->ajax()){
            $data = odontologossin::latest()->get();
            return DataTables::of($data)
              ->addIndexColumn()
              ->addColumn('otros', function($row){
                  $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Edit"
                    class="edit btn btn-primary btn-sm editCustomer">Editar</a>';
                  $btn = $btn. '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Delete"
                    class="btn btn-danger btn-sm deleteCustomer">Borrar</a>';
                    return $btn;
              })
            ->rawColumns(['otros'])
            ->make(true);
          }
          return view('odontologos.reportessinfile');
    }

    public function store(Request $request){
 
          if($request->Customer_id != ''){
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
              'img' => $request->$img2,
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
          return response()->json(['success'=>'El odontologo se guardo correctamente...!!!']);
        }
  
      public function edit($id){
        $query = odontologos::find($id);
        return response()->json($query);
      }
  
      public function destroy($id){
        odontologos::find($id)->delete();
        return response()->json(['success'=>'El odontologo se elimino correctamente...!!!']);
      }
}
