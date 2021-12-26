<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productos;

class ProductosController extends Controller
{
    public function index(){
        $productos = Productos::all();
        return view('carrito/productos', compact('productos'));
    }

    public function carrito(){
        return view('carrito/carrito');
    }

    public function agregar($id){
        $productos = Productos::find($id);
        if(!$productos){ abort(404);}
        
        $carrito = session()->get('carrito');

        //Si el carrito está vació, introduce el primer producto 
        if(!$carrito){
            $carrito = [
                $id= [
                    "nombre" => $productos->nombre,
                    "descripcion" => $productos->descripcion,
                    "costo" => $productos->costo,
                    "cantidad" => 1,
                    "img" => $productos->img,
                ]
            ];
            
        session()->put('carrito', $carrito);
        return redirect()->back()->with('success', 'Producto añadido !!!');
        }

        //Si el carrito no esta vacio, verifica que el producto y añade la cantidad
        if(isset($carrito[$id])){
            $carrito[$id]['cantidad']++;
            session()->put('carrito', $carrito);
            return redirect()->back()->with('success', 'Producto añadido al carrito');
        }

        // si el carrito no existen productos, lo integran con cantidad de 1 
        $carrito[$id] = [
            "nombre" => $productos->nombre,
            "descripcion" => $productos->descripcion,
            "costo" => $productos->costo,
            "cantidad" => 1,
            "img" => $productos->img
        ];
        session()->put('carrito', $carrito);
        return redirect()->back()->with('success', 'Producto añadido al carrito');
        
    }

    public function actualizar(Request $request){
        if($request->id and $request->cantidad){
            $carrito = session()->get('carrito');
            $carrito[$request->id]['cantidad'] = $request->cantidad;
            session()->put('carrito', $carrito);
            session()->flash('success', 'El carrito se ha actualizado con exito');
        }
    }

    public function borrar(request $request){
        if ($request->id) {
            $carrito = session()->get('carrito');
            if (isset($carrito[$request->id]));
            unset($carrito[$request->id]);
            session()->put('carrito',$carrito);
        }
        session()->flash('sucess','producto borrado con exito');
    }
}
