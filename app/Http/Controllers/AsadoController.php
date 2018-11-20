<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asado;
use File;

class AsadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $asados = Asado::orderBy('id','DESC')->get();
        return view('asados.index', compact('asados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = uniqid().'_'.$request->file('imagen')->getClientOriginalName();
        $request->file('imagen')->move(public_path().'/images/', $name);
        $asado = Asado::create([
            "descripcion" => $request->descripcion,
            "imagen" => $name,
            "cliente_id" => $request->idCliente,
            "estado" => 0 
        ]);
        return response()->json(['response' => 'success', 'asado' => $asado]);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asado $asado)
    {
        $asado->estado = $request->estado;
        $asado->update();

        return response()->json(['response' => 'success', 'asado' => $asado]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asado $asado)
    {
        File::delete(public_path().'/images/'.$asado->imagen);
        $asado->delete();
        return true;
    }
}
