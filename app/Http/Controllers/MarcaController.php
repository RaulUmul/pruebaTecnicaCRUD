<?php

namespace App\Http\Controllers;
use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    //
    public function index(){
        $marca = Marca::all();
        return response()->json($marca);
    }

    public function create(Request $request){
        $marca = new Marca();
        $marca->descripcion = $request->descripcion;
        $marca->save();
    }
}
