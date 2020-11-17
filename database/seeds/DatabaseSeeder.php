<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(VM17015Seeder::class);
        $this->call(MP19084Seeder::class);
        $this->call(AL13013Seeder::class);
        $this->call(GR09071Seeder::class);
        $this->call(BU03002Seeder::class);
        $this->call(SS06003Seeder::class);
    }
}
