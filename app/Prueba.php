<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prueba extends Model
{
    //
    protected $fillable = [
        'nombre', 'activo', 'atributo_largo'
    ];

    public function tablaAparte()
    {
        return $this->hasMany(TablaAparte::class);
    }
}
