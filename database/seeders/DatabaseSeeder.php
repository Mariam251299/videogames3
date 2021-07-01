<?php

namespace Database\Seeders;

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
        //directorio de todos los seeders que queramos que se ejecuten en automatico
        // \App\Models\User::factory(10)->create();
        $this->call([
            VideogamesSeeder::class,
            FtpvideogamesSeeder::class,
            //TicketsSeeder::class,
        ]);
    }
}
