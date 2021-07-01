<?php

namespace Database\Seeders;

use App\Models\Videogame;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class VideogamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //insercion de datos mediante el seeder:
        //1. mediante esta...
        DB::table('videogames')->insert([
            'nombre' => 'Call of Duty:Modern Warfare 2019',
            'categoria' => 'Accion',
            'plataforma' => 'PlayStation 4',
            'precio' => 1495.00,
            'portada' => 'https://images-na.ssl-images-amazon.com/images/I/618zOLuY1aS._AC_SL1000_.jpg',
            'descripcion' => 'El nuevo título, publicado por Activision y desarrollado por Infinity Ward, envuelve a los jugadores en un conflicto de hoy en día, donde las decisiones de una fracción de segundo podrían afectar el equilibrio global de poder. El nuevo Modern Warfare presenta una experiencia narrativa unificada y una progresión a través de una épica e intensa historia para un jugador, un campo de juego multijugador lleno de acción y un totalmente nuevo modo de juego cooperativo.',
            'user_id'=>1,
        ]);
        //2. o mediante el modelo (el mas indicado)

        Videogame::create(['nombre' => 'Crash Bandicoot N. Sane Trilogy','categoria' => 'Aventura', 'plataforma' => 'PlayStation 4', 'precio' => 950.57,'portada' => 'https://images-na.ssl-images-amazon.com/images/I/71nBbYyOrfS._AC_SL1000_.jpg', 'descripcion' => 'Vuelve Crash Bandicoot mejorado, embelesado y listo para bailar con la colección de juegos la trilogía ahora puedes jugar a Crash Bandicoot en 4K gira, salta, rompe, enfréntate a los épicos desafíos y vive las aventuras de los tres juegos con los que empezó todo: Crash Bandicoot, Crash Bandicoot 2: Cortex Strikes Back y Crash Bandicoot 3: Warped vuelve a vivir tus momentos favoritos de Crash con gráficos remasterizados en alta definición y prepárate para disfrutar a tope.', 'user_id'=>1]);
    }
}
