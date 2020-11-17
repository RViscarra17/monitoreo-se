<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [
        'titulo', 'precio', 'disponible', 'publicado', 'autor_id'
    ];

    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }
}
