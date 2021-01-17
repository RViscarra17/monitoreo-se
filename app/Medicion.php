<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicion extends Model
{
    //
    protected $fillable = [
        'componente_id', 'sesion_id', 'valor', 'hora_medicion'
    ];

    public function componente()
    {
        return $this->belongsTo(Componente::class);
    }

    public function sesion ()
    {
        return $this->belongsTo(Sesion::class);
    }
}
