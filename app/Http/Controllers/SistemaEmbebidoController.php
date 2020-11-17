<?php

namespace App\Http\Controllers;

use App\User;
use App\SistemaEmbebido;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SistemaEmbebidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sistemaEmbebidos = SistemaEmbebido::all();
        return response()->json($sistemaEmbebidos, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if (!isset($request->user_id)) {
            return response()->json(['error' => 'Debe proporcionar el usuario al que pertenece'], 400);
        }

        try {
            User::findOrFail($request->user_id);
        } catch (ModelNotFoundException $th) {
            return response()->json(['error'=> 'El usuario no existe'],404);
        }

        if (!isset($request->nombre)) {
            return response()->json(['error' => 'Debe proporcionar un nombre para el sistema embebido'], 400);
        }

        if (!isset($request->activo)) {
            return response()->json(['error' => 'Debe definir un estado'], 400);
        }

        try {
            $sistemaEmbebido = SistemaEmbebido::create($request->all());
        } catch (QueryException $th) {
            return response()->json(['error' => 'No se pudo guardar en la base de datos'], 400);
        }

        return response()->json($sistemaEmbebido, 201);
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
        try {
            $sistemaEmbebido = SistemaEmbebido::findOrFail($id);
        } catch (ModelNotFoundException $th) {
            return response()->json(['error'=> 'No se encuentra el sistema embebido'],404);
        }

        return response()->json($sistemaEmbebido,200);
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
        //
        try {
            $sistemaEmbebido = SistemaEmbebido::findOrFail($id);
        } catch (ModelNotFoundException $th) {
            return response()->json(['error'=> 'No se encuentra el sistema embebido'],404);
        }



        if(!isset($request->user_id) && !isset($request->nombre) && !isset($request->activo))
        {
            return response()->json(['data'=>'no se envio informacion'],400.6);
        }


        if(isset($request->user_id))
        {
            try {
                User::findOrFail($request->user_id);
            } catch (ModelNotFoundException $th) {
                return response()->json(['error'=> 'El usuario no existe'],404);
            }
            $sistemaEmbebido->user_id = $request->user_id;

        }
        if(isset($request->nombre))
        {
            $sistemaEmbebido->nombre=$request->nombre;

        }

        if(isset($request->activo))
        {
            $sistemaEmbebido->activo=$request->activo;

        }

        $sistemaEmbebido->save();
        return response()->json(['data'=>'se ha modificado el registro', 'Sistema Embebido' => $sistemaEmbebido],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $sistemaEmbebido = SistemaEmbebido::findOrFail($id);
        } catch (ModelNotFoundException $th) {
            return response()->json(['error'=> 'No se encuentra el sistema embebido'],404);
        }

        $sistemaEmbebido->delete();
        return response()->json(['data'=> 'Se elimino correctamente','sistema embebido'=> $sistemaEmbebido],200);
    }
}
