<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicion extends Model
{
    //
    protected $fillable = [
        'componente_id', 'valor'
    ];

    public function componente()
    {
        return $this->belongsTo(Componente::class);
    }
}
