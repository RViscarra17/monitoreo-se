<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Componente extends Model
{
    //
    protected $fillable = [
        'id_componente','id_sistema_embebido','id_tipo_dato','id_unidad','nombre'
    ];

    public function sistemaEmbebido()
    {
        return $this->belongsTo(SistemaEmbebido::class);
    }

    public function tipoDato()
    {
        return $this->belongsTo(TipoDato::class);
    }

    public function unidad()
    {
        return $this->belongsTo(Unidad::class);
    }

    public function medicion()
    {
        return $this->hasMany(Medicion::class);
    }
}
