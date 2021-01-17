<?php

namespace App\Http\Controllers;

use App\SistemaEmbebido;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SesionController extends Controller
{
    //
    public function show ($id)
    {
        try {
            $sistemaEmbebido = SistemaEmbebido::findOrFail($id);
        } catch (ModelNotFoundException $th) {
            return response()->json(['error' => 'El sistema embebido no existe'], 404);
        }

        $sesiones = $sistemaEmbebido->sesiones;

        return response()->json($sesiones, 200);
    }
}
