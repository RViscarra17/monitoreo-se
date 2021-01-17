<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    protected $fillable = [
        'sistema_embebido_id', 'inicio', 'fin'
    ];

    public function sistemaEmbebido()
    {
        return $this->belongsTo(SistemaEmbebido::class);
    }

    public function mediciones ()
    {
        return $this->hasMany(Medicion::class);
    }
}
