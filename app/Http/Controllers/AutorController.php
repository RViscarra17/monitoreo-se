<?php

namespace App\Http\Controllers;

use App\Autor;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $autores = Autor::all();

        return response()->json($autores, 200);
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

        if (!isset($request->nombre)) {
            return response()->json(['error' => 'El nombre no puede estar vacio'], 400);
        }

        if (!isset($request->edad)) {
            return response()->json(['error' => 'La edad no puede estar vacia'], 400);
        }

        try {
            $autor = Autor::create([
                'nombre' => $request->nombre,
                'edad' => $request->edad
            ]);
        } catch (QueryException $th) {
            return response()->json(['error' => 'No se pudo guardar en la base de datos'], 400);
        }

        return response()->json($autor, 200);
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
            $autor = Autor::findOrFail($id);
        } catch (ModelNotFoundException $th) {
            return response()->json(['error' => 'No se encontro el autor'], 404);
        }

        return response()->json($autor, 200);
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
            $autor = Autor::findOrFail($id);
            // dd($autor);
        } catch (ModelNotFoundException $th) {
            return response()->json(['error' => 'No se encontro el autor'], 404);
        }

        if (!isset($request->nombre) && !isset($request->edad)) {
            return response()->json(['data' => 'No se envio informacion'], 200);
        } elseif (!isset($request->nombre)) {
            $autor->edad = $request->edad;
            $autor->save();
        } elseif (!isset($request->edad)) {
            $autor->nombre = $request->nombre;
            $autor->save();
        } else {
            $autor->nombre = $request->nombre;
            $autor->edad = $request->edad;
            $autor->save();
        }

        // $autor->nombre = $request->nombre;
        // $autor->edad = $request->edad;
        // $autor->save();

        return response()->json($autor, 200);
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
            $autor = Autor::findOrFail($id);
            // dd($autor);
        } catch (ModelNotFoundException $th) {
            return response()->json(['error' => 'No se encontro el autor'], 404);
        }

        $autor->delete();

        return response()->json(['data' => 'Se elimino correctamente', 'autor' => $autor], 200);
    }
}
