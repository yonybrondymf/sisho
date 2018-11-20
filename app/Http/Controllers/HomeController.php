<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use App\Asado;
use App\Cliente;
use DB;

class HomeController extends Controller
{
    public function index(){
    	$clientes = Cliente::with('asados')->get();
    	return view('home', compact('clientes'));
    }

    public function getAsados(){
    	$term = Input::get('valor');
	
		$results = array();
		
		$queries = Cliente::where('referencia', 'LIKE', '%'.$term.'%')
			->orWhere('codigo', 'LIKE', '%'.$term.'%')
			->get();
		
		foreach ($queries as $query)
		{
		    $results[] = [ 
		    	
		    	'label' => $query->codigo.' '.$query->referencia,
		    	'codigo' => $query->codigo,
		    	'referencia' => $query->referencia,
		    	'monto' => $query->monto_pagar,
		    	'hora' => $query->hora_entrega,
		    	'pagado' => $query->pagado,
		    	'asados' => $query->asados,
		    	'imagen' => $query->imagen
		    ];
		}
		return Response::json($results);
    }
}
