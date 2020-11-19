<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
         //dd($request->all());
         if(!isset($request->nombre)){
            return response()->json(['error' -> 'El nombre no puede estar vacio'], 400)
        }
        if(!isset($request->edad)){
            return response()->json(['error' -> 'La edad no puede estar vacio'], 400)
        }

        try{
            $sistemaEmbebido = SistemaEmbebido::created([
                'nombre' -> $request->nombre,
                'edad' -> $request->edad
            ]);
        }catch(QueryException $th){
            return response()->json(['error' -> 'no se pudo guardar en la base de datos'], 400);
        }

        return response()->json($sistemaEmbebido, 200);
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
        try{
            $sistemaEmbebido = SistemaEmbebido::findOrFall($id);

         }catch (ModelNotFoundException $th){
             return response()->json(['error'=> 'No se encuentra el sistema embebido'],404)
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
        dd($request->all());
        try{
            $sistemaEmbebido = SistemaEmbebido::findOrFall($id);

         }catch (ModelNotFoundException $th){
             return response()->json(['error'=> 'No se encuentra el sistema embebido'],404)
         }

         if(!isset($request->nombre) && !isset($request->edad)){
            return response()->json(['date' -> 'No se envio informacion'],200);
        }elseif(!isset($request->nombre)){
            $sistemaEmbebido->edad $request->edad;
            $sistemaEmbebido->save();
        }elseif(!isset($request->edad)){
            $sistemaEmbebido->nombre = $request->nombre;
            $sistemaEmbebido->save();
        }else{
            $sistemaEmbebido->nombre = $request->nombre;
            $sistemaEmbebido->edad = $request->edad;
            $sistemaEmbebido->save();
        }


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
        try{
            $sistemaEmbebido = SistemaEmbebido::findOrFall($id);

         }catch (ModelNotFoundException $th){
             return response()->json(['error'=> 'No se encuentra el sistema embebido'],404)
         }
         $sistemaEmbebido->delete();

         return response()->json(['dat'=> 'Se eliminó correctamente',$sistemaEmbebido],200);




