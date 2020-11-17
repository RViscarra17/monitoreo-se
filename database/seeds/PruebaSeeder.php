<?php

use App\Autor;
use App\Componente;
use App\Libro;
use App\SistemaEmbebido;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PruebaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Autor::create([
            'nombre' => 'Rafael Viscarra',
            'edad' => 23
        ]);

        Autor::create([
            'nombre' => 'Juan Antonio',
            'edad' => 25
        ]);

        Libro::create([
            'titulo' => 'Primer libro',
            'precio' => 25.50,
            'disponible' => false,
            'autor_id' => 1,
            'publicado' => Carbon::now(),
        ]);

        Libro::create([
            'titulo' => 'Segundo Libro',
            'precio' => 30.00,
            'disponible' => true,
            'autor_id' => 1,
            'publicado' => Carbon::now(),
        ]);

        Libro::create([
            'titulo' => 'Tercer libro',
            'precio' => 15.75,
            'disponible' => true,
            'autor_id' => 2,
            'publicado' => Carbon::now(),
        ]);

        Libro::create([
            'titulo' => 'Cuarto libro',
            'precio' => 10.20,
            'disponible' => true,
            'autor_id' => 2,
            'publicado' => Carbon::now(),
        ]);
    }
}
