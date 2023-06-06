<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\PresentacionController;
use App\Http\Controllers\ZonaController;
use App\Http\Controllers\ReportesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});


Route::get('/producto',[ProductoController::class,'index'])->name('producto.index');
Route::get('/producto/create',[ProductoController::class,'create'])->name('producto.create');
Route::post('/producto/store',[ProductoController::class,'store'])->name('producto.store');
Route::post('/producto/update',[ProductoController::class,'update'])->name('producto.update');
Route::get('/producto/delete/{id}',[ProductoController::class,'delete'])->name('producto.delete');
Route::get('/producto/edit/{id}',[ProductoController::class,'edit'])->name('producto.edit');
Route::get('/proveedor',[ProveedorController::class,'index'])->name('proveedor.index');
Route::get('/proveedor/create',[ProveedorController::class,'create'])->name('proveedor.create');
Route::get('/marca',[MarcaController::class,'index'])->name('marca.index');
Route::get('/marca/create',[MarcaController::class,'create'])->name('marca.create');
Route::get('/presentacion',[PresentacionController::class,'index'])->name('presentacion.index');
Route::get('/presentacion/create',[PresentacionController::class,'create'])->name('presentacion.create');
Route::get('/zona',[ZonaController::class,'index'])->name('zona.index');
Route::get('/zona/create',[ZonaController::class,'create'])->name('zona.create');

// Reporteria
Route::get('/reportes',[ReportesController::class,'index'])->name('reportes.index');
Route::get('/reportes/general',[ReportesController::class,'reporteGeneral'])->name('reportes.general');
Route::get('/reportes/proveedor',[ReportesController::class,'reporteProveedor'])->name('reportes.proveedor');
