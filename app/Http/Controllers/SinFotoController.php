<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use PDF;
use App\Models\sinfoto;

class SinFotoController extends Controller
{
    public function sinfoto(Request $request){
        // $consulta = SinAlumnos::all();
        if($request->ajax()){
              $data = sinfoto::latest()->get();
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
            return view('welcomes');
        //     $consulta = sinfoto::all();
        // return $consulta;
      }
  
    public function sin(Request $request){
        if($request->Customer_id != ''){
            sinfoto::where('id', $request->Customer_id)->update([
            'nombres' => $request->nombres,
            'apellidopa' => $request->apellidopa,
            'sex' => $request->sex,
            'eda' => $request->eda,
            'telefon' => $request->telefon,
            'emai' => $request->emai,
            'pas' => $request->pas
          ]);
        }
        else{
            sinfoto::create($request->only('nombres', 'apellidopa', 'sex', 'eda', 
            'telefon','emai', 'pas'));
        }
        return response()->json(['success'=>'El cliente se guardo correctamente...!!!']);
      }
    
  
    public function editarodo($id){
      $query = sinfoto::find($id);
      return response()->json($query);
    }
  
    public function destroyodo($id){
        sinfoto::find($id)->delete();
      return response()->json(['success'=>'El cliente se elimino correctamente...!!!']);
    }
}
