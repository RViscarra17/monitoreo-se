<?php

namespace App\Http\Controllers;

use App\User;
use App\Unidad;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $unidades = Unidad::all();
        return response()->json($unidades, 200);
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
        // try {
        //     Componente::findOrFail($request->componente_id);
        // } catch (ModelNotFoundException $th) {
        //     return response()->json(['error'=> 'El componente no existe'],404);
        // }
        // dd($request->all());

        if (isset($request->user_id)) {
            try {
                User::findOrFail($request->user_id);
            } catch (ModelNotFoundException $th) {
                return response()->json(['error'=> 'El usuario no existe'],404);
            }
        }

        if (!isset($request->nombre)) {
            return response()->json(['error' => 'Debe proporcionar el nombre de la unidad'], 400);
        }

        // if (!isset($request->abreviacion)) {
        //     return response()->json(['error' => 'Debe proporcionar el nombre de la unidad'], 400);
        // }

        try {
            $unidad = Unidad::create($request->all());
        } catch (QueryException $th) {
            return response()->json(['error' => 'No se pudo guardar en la base de datos'], 400);
        }

        return response()->json($unidad, 201);
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
            $unidad = Unidad::findOrFail($id);
        } catch (ModelNotFoundException $th) {
            return response()->json(['error'=> 'No se encuentra la unidad'],404);
        }

        return response()->json($unidad,200);
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
            $unidad = Unidad::findOrFail($id);
        } catch (ModelNotFoundException $th) {
            return response()->json(['error'=> 'No se encuentra la unidad'],404);
        }



        if(!isset($request->nombre) && !isset($request->user_id) && !isset($request->abreviacion))
        {
            return response()->json(['data'=>'Como minimo se requiere un nombre'],400.6);
        }


        if (isset($request->user_id)) {
            try {
                User::findOrFail($request->user_id);
            } catch (ModelNotFoundException $th) {
                return response()->json(['error'=> 'El usuario no existe'],404);
            }

            $unidad->user_id = $request->user_id;
        }
        if(isset($request->nombre))
        {
            $unidad->nombre=$request->nombre;
        }
        if(isset($request->abreviacion))
        {
            $unidad->abreviacion=$request->abreviacion;
        }

        $unidad->save();
        return response()->json(['data'=>'se ha modificado el registro', 'unidad' => $unidad],200);
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
            $unidad = Unidad::findOrFail($id);
        } catch (ModelNotFoundException $th) {
            return response()->json(['error'=> 'No se encuentra la unidad'],404);
        }

        $unidad->delete();
        return response()->json(['data'=> 'Se elimino correctamente','unidad'=> $unidad],200);
    }
}
