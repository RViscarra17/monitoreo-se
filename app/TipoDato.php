<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDato extends Model
{
    //
    protected $fillable = [
        'nombre'
    ];

    public function componentes()
    {
        return $this->hasMany(Componente::class);
    }
}
