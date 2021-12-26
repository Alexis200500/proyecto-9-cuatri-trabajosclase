<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\material_odontologico;
use Session;

class MaterialesController extends Controller
{
    public function altamaterial(){
      $consulta = material_odontologico::orderBy('idmaterial','DESC')
                             ->take(1)->get();
      $cuantos= count($consulta);
      if($cuantos==0){
      $idsigue = 1;
      }
      else{
      $idsigue = $consulta[0]->idmaterial+1;
      }

      return view('Material_odontologico/altamaterial')
             ->with('idsigue',$idsigue);
    }

    public function guardarmaterial(Request $request){
      $this->validate($request,[
        'nombre' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
        'marca' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
        'precio' => 'required|regex:/^[$][0-9]+[.,0-9]*$/',
        'fechareg' => 'required|date',
        'horareg' => 'required|regex:/^[0-9]+[:][0-9]+[ ][a-z]{2}$/',
        'pzas_exis' => 'required|regex:/^[0-9]*$/',
        'lote' => 'required|regex:/^[M][A][T][-][0-9]{4}/',
        'img' => 'image|mimes:gif,jpeg,png'
      ]);

      $file = $request->file('img');
      if($file<>""){
      $img = $file->getClientOriginalName();
      $img2 = $request->ide . $img;
      \Storage::disk('local')->put($img2, \File::get($file));
      }
      else{
        $img2 = "sinfoto.jpg";
      }

      $material_odontologico = new material_odontologico;
      $material_odontologico->idmaterial = $request->idmaterial;
      $material_odontologico->nombre = $request->nombre;
      $material_odontologico->marca = $request->marca;
      $material_odontologico->precio = $request->precio;
      $material_odontologico->fechareg = $request->fechareg;
      $material_odontologico->horareg = $request->horareg;
      $material_odontologico->pzas_exis = $request->pzas_exis;
      $material_odontologico->lote = $request->lote;
      $material_odontologico->img = $img2;
      $material_odontologico->save();

      Session::flash('mensaje',"El material ha sido registrado correctamente");
      return redirect()->route('reportemateriales');
    }

    public function reportemateriales(){
      $consulta = material_odontologico::withTrashed()->select(['idmaterial','nombre','marca','precio','pzas_exis','lote','deleted_at','img'])
      ->orderBy('material_odontologicos.nombre')
      ->get();
      //return $consulta;
      return view('Material_odontologico/reportemateriales')->with('consulta',$consulta);
    }

    public function desactivarmaterial($idmaterial){
      $material_odontologico = material_odontologico::find($idmaterial);
      $material_odontologico->delete();

      Session::flash('mensaje',"El material ha sido desactivado correctamente");
      return redirect()->route('reportemateriales');
    }

    public function activarmaterial($idmaterial){
      $material_odontologico = material_odontologico::withTrashed()->where('idmaterial',$idmaterial)->restore();

      Session::flash('mensaje',"El material ha sido activado correctamente");
      return redirect()->route('reportemateriales');
  }

  public function borrarmaterial($idmaterial){
    $material_odontologico = material_odontologico::withTrashed()->find($idmaterial)->forceDelete();

    Session::flash('mensaje',"El material ha sido elimando del sistema correctamente");
    return redirect()->route('reportemateriales');
  }

  public function modificarmaterial ($idmaterial){
    $consulta = material_odontologico::withTrashed()->select('idmaterial','nombre','marca','precio','pzas_exis','lote','horareg','fechareg','img')
    ->where('idmaterial',$idmaterial)
    ->get();
    return view('Material_odontologico/modificarmateriales')
    ->with('consulta',$consulta[0]);
  }

  public function guardacambiosm (Request $request){
    $this->validate($request,[
      'nombre' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
      'marca' => 'required|regex:/^[A-Z][A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
      'precio' => 'required|regex:/^[$][0-9]+[.,0-9]*$/',
      'fechareg' => 'required|date',
      'horareg' => 'required|regex:/^[0-9]+[:][0-9]+[ ][a-z]{2}$/',
      'pzas_exis' => 'required|regex:/^[0-9]*$/',
      'lote' => 'required|regex:/^[M][A][T][-][0-9]{4}/',
      'img' => 'image|mimes:gif,jpeg,png'
    ]);

    $file = $request->file('img');
    if($file<>""){
    $img = $file->getClientOriginalName();
    $img2 = $request->ide . $img;
    \Storage::disk('local')->put($img2, \File::get($file));
    }

    $material_odontologico = material_odontologico::withTrashed()->find($request->idmaterial);;
    $material_odontologico->idmaterial = $request->idmaterial;
    $material_odontologico->nombre = $request->nombre;
    $material_odontologico->marca = $request->marca;
    $material_odontologico->precio = $request->precio;
    $material_odontologico->fechareg = $request->fechareg;
    $material_odontologico->horareg = $request->horareg;
    $material_odontologico->pzas_exis = $request->pzas_exis;
    $material_odontologico->lote = $request->lote;
    if($file<>""){
    $material_odontologico->img = $img2;
    }
    $material_odontologico->save();

    Session::flash('mensaje',"El material ha sido modificado correctamente");
    return redirect()->route('reportemateriales');
  }

  public function download($img){
      $pathtoFile = public_path().'//archivos/'. $img;
      return response()->download($pathtoFile);
    }
}
