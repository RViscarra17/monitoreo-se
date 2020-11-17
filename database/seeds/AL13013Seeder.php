<?php

use Illuminate\Database\Seeder;
use App\SistemaEmbebido;
use App\TipoDato;
use App\Unidad;
use App\Medicion;
use App\Componente;

class AL13013Seeder extends Seeder
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
            'user_id' => 1,
            'nombre' => 'Sistema 1',
            'activo' => true
        ]);

        SistemaEmbebido::create([
            'user_id' => 1,
            'nombre' => 'Sistema 2',
            'activo' => false
        ]);

        TipoDato::create([
            'nombre' => 'Entero'
        ]);

        TipoDato::create([
            'nombre' => 'Decimal'
        ]);

        TipoDato::create([
            'nombre' => 'Cadena de Texto'
        ]);

        Unidad::create([
            'nombre' => 'Metro',
            'abreviacion' => 'm'
        ]);

        Unidad::create([
            'nombre' => 'Kilogramo',
            'abreviacion' => 'kg'
        ]);

        Unidad::create([
            'nombre' => 'Segundo',
            'abreviacion' => 's'
        ]);

        Componente::create([
            'sistema_embebido_id'=>1,
            'tipo_dato_id'=>1,
            'unidad_id'=>1,
            'nombre'=>'cuarto sistema'

        ]);

        Componente::create([
            'sistema_embebido_id'=>1,
            'tipo_dato_id'=>2,
            'unidad_id'=>3,
            'nombre'=>'primer componente'

        ]);

        Componente::create([
            'sistema_embebido_id'=>2,
            'tipo_dato_id'=>3,
            'unidad_id'=>2,
            'nombre'=>'segundo componente'

        ]);

        Componente::create([
            'sistema_embebido_id'=>2,
            'tipo_dato_id'=>1,
            'unidad_id'=>3,
            'nombre'=>'tercer componente'

        ]);

        Medicion::create([
            'componente_id'=>1,
            'valor'=>'muy bajo'
        ]);

        Medicion::create([
            'componente_id'=>2,
            'valor'=>'bajo'
        ]);

        Medicion::create([
            'componente_id'=>3,
            'valor'=>'alto'
        ]);

        Medicion::create([
            'componente_id'=>4,
            'valor'=>'muy alto'
        ]);

        Medicion::create([
            'componente_id'=>1,
            'valor'=>'bajo'
        ]);

        Medicion::create([
            'componente_id'=>2,
            'valor'=>'medio'
        ]);

        Medicion::create([
            'componente_id'=>3,
            'valor'=>'alto'
        ]);

        Medicion::create([
            'componente_id'=>4,
            'valor'=>'muy alto'
        ]);
    }
}
