<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = ['referencia','monto_pagar','codigo','hora_entrega','hora_recepcion','cantidad_asados','pagado'];

    public $timestamps = false;

    public function asados(){
    	return $this->hasMany('App\Asado');
    }
}
