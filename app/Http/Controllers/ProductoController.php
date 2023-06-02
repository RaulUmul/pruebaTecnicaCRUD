<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Zona;
use App\Models\Presentacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductoController extends Controller
{
    // Consulta solo la tabla producto para ingresar la informacion adecuada.
    public function index(){
        $marca = Marca::all();
        $productos = Producto::with('marca','proveedor','zona','presentacion')->get();
        // return $productos;
        return view('producto.index',compact('marca','productos'));
    }

    // Creacion de producto, retorna las variables para mostar la descripcion en los Input tipo Select
    public function create(){
        $proveedor = Proveedor::all();
        $marca = Marca::all();
        $presentacion = Presentacion::all();
        $zona = Zona::all();
        return view('producto.create',compact('proveedor','marca','presentacion','zona'));
    }

    public function store(Request $request){
        // return $request;

        try{

        DB::beginTransaction();

        $producto = new Producto();
        $producto->id_marca = $request->id_marca;
        $producto->id_presentacion = $request->id_presentacion;
        $producto->id_proveedor = $request->id_proveedor;
        $producto->id_zona = $request->id_zona;
        $producto->codigo = $request->codigo;
        $producto->descripcion_producto = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->iva = $request->iva;
        $producto->peso = $request->peso;
        $producto->save();
        DB::commit();
        return redirect('/producto');
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
        }

    }

    public function edit($id){
        $producto = Producto::with('marca','proveedor','zona','presentacion')->where('id_producto',$id)->first();
        $proveedor = Proveedor::all();
        $marca = Marca::all();
        $presentacion = Presentacion::all();
        $zona = Zona::all();
        return view('producto.edit',compact('producto','proveedor','marca','presentacion','zona'));
    }

    public function update(){
        return redirect('/producto');
    }

    public function delete($id){
        $producto = Producto::find($id);
        $producto->delete();
        return redirect('/producto');
    }


}
