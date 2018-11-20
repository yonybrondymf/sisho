<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asado extends Model
{
    protected $table = 'clientes_asados';

    protected $fillable = ['descripcion','imagen','estado','cliente_id'];

    public $timestamps = false;

    public function cliente(){
    	return $this->belongsTo('App\Cliente','cliente_id');
    }
}
