<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class SistemaEmbebido extends Model
{
    //
    protected $fillable = [
        'user_id', 'nombre', 'activo'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function componentes()
    {
        return $this->hasMany(Componente::class);
    }

    public function sesiones ()
    {
        return $this->hasMany(Sesion::class);
    }
}
