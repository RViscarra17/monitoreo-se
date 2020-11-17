<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    //
    protected $fillable = [
        'nombre', 'edad'
    ];

    public function libros()
    {
        return $this->hasMany(Libro::class);
    }
}
