<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TablaAparte extends Model
{
    //
    protected $fillable = [
        'prueba_id', 'nombre'
    ];

    public function prueba()
    {
        return $this->belongsTo(Prueba::class);
    }
}
