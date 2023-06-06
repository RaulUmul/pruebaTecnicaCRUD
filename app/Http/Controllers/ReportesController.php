<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Models\Producto;
use App\Models\Marca;
use App\Models\Presentacion;
use App\Models\Zona;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function index(){
        $proveedor = Proveedor::all();
        return view('reporte.index',compact('proveedor'));
    }

    public function reporteGeneral(){
        $productos = Producto::with('marca','proveedor','zona','presentacion')->get();
        return view('reporte.tablaReporte',compact('productos'));
    }

    public function reporteProveedor(Request $request){
        $productos = Producto::with('marca','proveedor','zona','presentacion')->whereRelation('proveedor','id_proveedor',$request->proveedor)->get();
        return view('reporte.tablaReporte',compact('productos'));
    }

}
