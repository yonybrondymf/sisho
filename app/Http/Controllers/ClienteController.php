<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Asado;
use DB;
use Carbon\Carbon;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::with('asados')->get();
        return view('clientes.list',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'referencia' => 'required',
            'monto_pagar' => 'required',
            'codigo' => 'required',
            'hora_entrega' => 'required'
        ]);

        DB::beginTransaction();
        try {
            
            
            $cliente = Cliente::create([
                'referencia' => $request->referencia,
                'monto_pagar' => $request->monto_pagar,
                'codigo' => $request->codigo,
                'hora_entrega' => $request->hora_entrega,
                'cantidad_asados' => count($request->bandejas),
                'hora_recepcion' => Carbon::now()->format('h:i A'),
                'pagado' => $request->pagado,
            ]);

            $bandejas = $request->bandejas;

            for ($i=0; $i<count($bandejas); $i++) {
                $name = uniqid().'_'.$request->file('image')[$i]->getClientOriginalName();
                Asado::create([
                    'descripcion' => $bandejas[$i],
                    'cliente_id' => $cliente->id,
                    'imagen' => $name,
                    'estado' => 0,
                ]);
             
                $request->file('image')[$i]->move(public_path().'/images/', $name);
            }

            DB::commit();
            $success = true;
        } catch (\Exception $e) {
            $success = false;
            DB::rollback();
        }

        if ($success) {
            return redirect()->route('asados.index');
        }else{
            return redirect()->route('clientes.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
         return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'referencia' => 'required',
            'monto_pagar' => 'required',
            'codigo' => 'required',
            'hora_entrega' => 'required',
            'cantidad_asados' => 'required',
        ]);
        Cliente::create([
            'referencia' => $request->referencia,
            'monto_pagar' => $request->monto_pagar,
            'codigo' => $request->codigo,
            'hora_entrega' => $request->hora_entrega,
            'cantidad_asados' => $cantidad_asados,
        ]);

        return redirect()->route('clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes');
    }
}
