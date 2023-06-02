<?php

namespace App\Http\Controllers;

use App\Models\Zona;
use Illuminate\Http\Request;

class ZonaController extends Controller
{
    //

    public function index() {
        $zona = Zona::all();
        return response()->json($zona);
    }

    public function create(Request $request){
        $zona = new Zona();
        $zona->descripcion = $request->descripcion;
        $zona->save();
    }
}
