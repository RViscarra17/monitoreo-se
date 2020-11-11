<?php

use App\User;
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
    }
}
