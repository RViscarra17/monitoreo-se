<?php

namespace App\Http\Controllers;

use App\Medicion;
use App\Componente;
use App\Sesion;
use App\SistemaEmbebido;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MedicionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mediciones = Medicion::all();
        return response()->json($mediciones, 200);
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

        try {
            Componente::findOrFail($request->componente_id);
        } catch (ModelNotFoundException $th) {
            return response()->json(['error' => 'El componente no existe'], 404);
        }

        if (!isset($request->componente_id)) {
            return response()->json(['error' => 'Debe proporcionar el componente al que pertenece'], 400);
        }

        if (!isset($request->valor)) {
            return response()->json(['error' => 'Debe proporcionar el valor'], 400);
        }

        try {
            $medicion = Medicion::create([
                'componente_id' => $request->componente_id,
                'valor' => $request->valor,
            ]);
        } catch (QueryException $th) {
            return response()->json(['error' => 'No se pudo guardar en la base de datos'], 400);
        }

        return response()->json($medicion, 201);
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
            $medicion = Medicion::findOrFail($id);
        } catch (ModelNotFoundException $th) {
            return response()->json(['error' => 'No se encuentra la medicion'], 404);
        }

        return response()->json($medicion, 200);
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
            $medicion = Medicion::findOrFail($id);
        } catch (ModelNotFoundException $th) {
            return response()->json(['error' => 'No se encuentra la medicion'], 404);
        }



        if (!isset($request->componente_id) && !isset($request->valor)) {
            return response()->json(['error' => 'Se requiere un campo como mínimo.'], 400.6);
        }


        if (isset($request->componente_id)) {
            try {
                Componente::findOrFail($request->componente_id);
            } catch (ModelNotFoundException $th) {
                return response()->json(['error' => 'El componente no existe'], 404);
            }
            $medicion->componente_id = $request->componente_id;
        }
        if (isset($request->valor)) {
            $medicion->valor = $request->valor;
        }

        $medicion->save();
        return response()->json(['data' => 'se ha modificado el registro', 'medicion' => $medicion], 200);
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
            $medicion = Medicion::findOrFail($id);
        } catch (ModelNotFoundException $th) {
            return response()->json(['error' => 'No se encuentra la medicion'], 404);
        }

        $medicion->delete();
        return response()->json(['data' => 'Se elimino correctamente', 'medicion' => $medicion], 200);
    }

    public function guardarMediciones(Request $request, $id)
    {
        $data = $request->all();

        try {
            $sistemaEmbebido = SistemaEmbebido::findOrFail($data[0]['canal']);
            $componentes = $data[0]['componentes'];
            foreach ($componentes as $componente) {
                Componente::findOrFail($componente['id']);
            }
        } catch (ModelNotFoundException $th) {
            return response()->json(['error' => 'El sistema embebido o los componentes no existen'], 404);
        }

        $horaInicial = $data[0]['hora_medicion'];
        $horaFinal = end($data)['hora_medicion'];

        try {
            $sesion = Sesion::create([
                'sistema_embebido_id' => $sistemaEmbebido->id,
                'inicio' => $horaInicial,
                'fin' => $horaFinal,
            ]);
        } catch (QueryException $th) {
            return response()->json(['error' => 'No se pudo guardar en la base de datos'], 400);
        }

        foreach ($data as $fila) {
            foreach ($fila['componentes'] as $medicion) {
                // return response()->json($medicion, 200);

                try {
                    Medicion::create([
                        'componente_id' => $medicion['id'],
                        'sesion_id' => $sesion->id,
                        'valor' => $medicion['medicion'],
                        'hora_medicion' => $fila['hora_medicion'],
                    ]);
                } catch (QueryException $th) {
                    return response()->json(['error' => 'No se pudo guardar en la base de datos'], 400);
                }
            }
        }

        return response()->json(['data' => 'Guardado con exito'], 201);
    }
}
