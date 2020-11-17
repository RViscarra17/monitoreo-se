<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    //
    protected $fillable = [
        'user_id', 'nombre', 'abreviacion'
    ];

    public function componentes()
    {
        return $this->hasMany(Componente::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
