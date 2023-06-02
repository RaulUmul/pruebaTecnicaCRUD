<?php

namespace App\Http\Controllers;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    //

    public function index(){
        $proveedor = Proveedor::all();
        return response()->json($proveedor);
    }

    public function create(Request $request){
        $proveedor = new Proveedor();
        $proveedor->descripcion = $request->descripcion;
        $proveedor->save();
    }
}
