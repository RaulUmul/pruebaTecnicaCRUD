<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    protected $table =  'marca';
    protected $primaryKey = 'id_marca';
    public $timestamps = false;
    public $autoincrement = false;
    public $incrementing = false;

    public $guarded = [];

    public function productos(){
        $this->hasMany('App\Models\Producto','id_producto');
    }
}
