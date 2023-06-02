<?php

namespace App\Http\Controllers;
use App\Models\Presentacion;
use Illuminate\Http\Request;

class PresentacionController extends Controller
{
    //

    public function index(){

        $presentacion = Presentacion::all();
        return response()->json($presentacion);
    }

    public function create(Request $request){
        $presentacion = new Presentacion();
        $presentacion->descripcion = $request->descripcion;
        $presentacion->save();
    }
}
