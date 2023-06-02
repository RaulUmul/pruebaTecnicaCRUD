<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table =  'producto';
    protected $primaryKey = 'id_producto';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing = false;

    public $guarded = [];


    public function marca(){
        return $this->belongsTo('App\Models\Marca','id_marca');
    }
    public function proveedor(){
       return $this->belongsTo('App\Models\Proveedor','id_proveedor');
    }
    public function presentacion(){
        return $this->belongsTo('App\Models\Presentacion','id_presentacion');
    }
    public function zona(){
        return $this->belongsTo('App\Models\Zona','id_zona');
    }
}
