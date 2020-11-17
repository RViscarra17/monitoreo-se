<?php
use App\Componente;
use App\Medicion;
use App\SistemaEmbebido;
use App\TipoDato;
use App\Unidad;
use Illuminate\Database\Seeder;

class GR09071Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        SistemaEmbebido::create([
            'user_id'=>1,
            'nombre'=>"Modo de prueba 1",
            'activo'=>true
        ]);
        Sistemaembebido::create([
            'user_id'=>1,
            'nombre'=>"Modo de prueba 2",
            'activo'=>false
        ]);
        TipoDato::create([
            'nombre'=>"Entero"
        ]);
        TipoDato::create([
            'nombre'=>"Decimal"
        ]);
        TipoDato::create([
            'nombre'=>"Cadena de texto"
        ]);

        Unidad::create([
            'user_id'=>1,
            'nombre'=>"Metro",
            'abreviacion'=>"M"
        ]);
        Unidad::create([
            'user_id'=>1,
            'nombre'=>"Gramo",
            'abreviacion'=>"G"
        ]);
        Unidad::create([
            'user_id'=>1,
            'nombre'=>"Amperio",
            'abreviacion'=>"A"
        ]);

       Componente::create([
        'sistema_embebido_id'=>1,
        'tipo_dato_id'=>1,
        'unidad_id'=>2,
        'nombre'=>"Sistema de muestreo digital"
       ]);
       Componente::create([
        'sistema_embebido_id'=>1,
        'tipo_dato_id'=>2,
        'unidad_id'=>3,
        'nombre'=>"Sistema de pesaje"
       ]);
       Componente::create([
        'sistema_embebido_id'=>2,
        'tipo_dato_id'=>3,
        'unidad_id'=>1,
        'nombre'=>"Sistema de Kilometraje recorrido"
       ]);
       Componente::create([
        'sistema_embebido_id'=>2,
        'tipo_dato_id'=>1,
        'unidad_id'=>2,
        'nombre'=>"Sistema de calculo de capacitancia"
       ]);

       Medicion::create([
        'componente_id'=>1,
        'valor'=>"siete amperios"
       ]);
       Medicion::create([
        'componente_id'=>1,
        'valor'=>"8 gramos"
       ]);
       Medicion::create([
        'componente_id'=>2,
        'valor'=>"quince gramos"
       ]);
       Medicion::create([
        'componente_id'=>2,
        'valor'=>"cinco metros"
       ]);
       Medicion::create([
        'componente_id'=>3,
        'valor'=>"diez metros"
       ]);
       Medicion::create([
        'componente_id'=>3,
        'valor'=>"cuarenta metros"
       ]);
       Medicion::create([
        'componente_id'=>4,
        'valor'=>"10 amperios"
       ]);
       Medicion::create([
        'componente_id'=>4,
        'valor'=>"3 amperios"
       ]);


    }

}
