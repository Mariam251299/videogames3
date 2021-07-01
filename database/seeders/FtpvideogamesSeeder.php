<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ftpvideogame;
use Illuminate\Support\Facades\DB;


class FtpvideogamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Aqui le indicamos cuantos registros automaticos queremos que haga
        //\App\Models\Ftpvideogame::factory(50)->create();
        Ftpvideogame::create(['nombre' => 'Super Mario Bros','categoria' => 'Arcade', 'descripcion' => 'Salva a la princesa superando retos a lo largo de diferentes mundos donde te enfrentaras a diferentes criaturas hasta llegar al Boss final que tendrás que derrotar para lograr tu objetivo.', 'juego'=>'https://fernandovargasr.github.io/SuperMarioBros1/']);

        Ftpvideogame::create(['nombre' => 'Kirby','categoria' => 'Arcade', 'descripcion' => 'Enfréntate a un mundo lleno de acción tensión y aventuras acompañando a nuestro héroe rosado en su incansable búsqueda del jefe maligno que lo atrapo en un planeta plagado de monstruos los cuales tendrá que derrotar para volver a casa con su familia.', 'juego'=>'https://fernandovargasr.github.io/kirby/']);
    }
}
