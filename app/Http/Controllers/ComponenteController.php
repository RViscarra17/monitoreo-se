<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Componente;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class ComponenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $componentes = Componente::all();
        return response()->json($componentes,200);
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

        // dd($request->all());
     if(!isset($request->sistema_embebido_id)){
        return response()->json(['error'=>'No ingreso el id del sistema embebido'],400);
     }
     if(!isset($request->tipo_dato_id)){
        return response()->json(['error'=>'El tipo de dato no debe de estar vacio'],400);

     }
     if(!isset($request->unidad_id)){
         return response()->json(['error'=>'La unidad perteneciente al componente no puede estar vacia'],400);
     }
     if(!isset($request->nombre)){
         return response()->json(['error'=>'El nombre del componente no debe de estar vacio'],400);
     }
     try{
     $componente=Componente::create([
      'sistema_embebido_id'=>$request->sistema_embebido_id,
      'tipo_dato_id'=>$request->tipo_dato_id,
      'unidad_id'=>$request->unidad_id,
      'nombre'=>$request->nombre
     ]);
     }catch(QueryException $t){
        return response()->json(['error'=>'El componente no se pudo almacenar en la base de datos'],400);
     }
     return response()->json($componente,201);
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
            $componente = Componente::findOrFail($id);
        } catch (ModelNotFoundException $th) {
            return response()->json(['error'=> 'No se encuentra el componente'],404);
        }

        return response()->json($componente,200);
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
            $componente = Componente::findOrFail($id);
        } catch (ModelNotFoundException $th) {
            return response()->json(['error'=> 'No se encuentra el componente'],404);
        }

        if(!isset($request->sistema_embebido_id) && !isset($request->tipo_dato_id) && !isset($request->unidad_id) && !isset($request->nombre))
        {
            return response()->json(['data'=>'no se envio informacion'],400.6);
        }


        if(isset($request->sistema_embebido_id))
        {
            $componente->sistema_embebido_id = $request->sistema_embebido_id;

        }
        if(isset($request->tipo_dato_id))
        {
            $componente->tipo_dato_id=$request->tipo_dato_id;

        }
        if(isset($request->unidad_id))
        {
            $componente->unidad_id=$request->unidad_id;

        }
        if(isset($request->nombre))
        {
            $componente->nombre = $request->nombre;

        }

        $componente->save();
        return response()->json(['data'=>'se ha modificado el registro'],200);
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
            $componente = Componente::findOrFail($id);
        } catch (ModelNotFoundException $th) {
            return response()->json(['error'=> 'No se encuentra el componente'],404);
        }

        $componente->delete();
        return response()->json(['data'=> 'Se elimino correctamente','componente'=> $componente],200);
    }
}
