<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SistemaEmbebido extends Model
{
    //
    protected $fillable = [
        'id_usuario','nombre','activo'
    ];

    public function usuario()
    {
        return $this-> belongsTo(usuario::class);
    }

    public function componente()
    {
        return $this->hasMany(componente::class);
    }
}
