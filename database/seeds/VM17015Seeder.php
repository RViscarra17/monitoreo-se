<?php

use App\User;
use App\Unidad;
use App\TipoDato;
use App\Componente;
use App\SistemaEmbebido;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class VM17015Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'admin',
            'codigo_usuario' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make("admin"),
        ]);

        SistemaEmbebido::create([
            'user_id'=>1,
            'nombre'=>"Sistema de temperatura y porcentaje de humedad",
            'activo'=>true
        ]);

        SistemaEmbebido::create([
            'user_id'=>1,
            'nombre'=>"Sistema de medicion de Luz",
            'activo'=>true
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
            'nombre'=>"Estandar",
            'abreviacion'=>""
        ]);
        Unidad::create([
            'user_id'=>1,
            'nombre'=>"Grado Centigrado",
            'abreviacion'=>"°C"
        ]);
        Unidad::create([
            'user_id'=>1,
            'nombre'=>"Porcentaje",
            'abreviacion'=>"%"
        ]);
        Unidad::create([
            'user_id'=>1,
            'nombre'=>"Voltaje",
            'abreviacion'=>"V"
        ]);

       Componente::create([
        'sistema_embebido_id'=>1,
        'tipo_dato_id'=>2,
        'unidad_id'=>2,
        'nombre'=>"Termometro"
       ]);
       Componente::create([
        'sistema_embebido_id'=>1,
        'tipo_dato_id'=>1,
        'unidad_id'=>3,
        'nombre'=>"Higrometro"
       ]);

       Componente::create([
        'sistema_embebido_id'=>2,
        'tipo_dato_id'=>1,
        'unidad_id'=>1,
        'nombre'=>"Fotoresistor"
       ]);
    }
}
