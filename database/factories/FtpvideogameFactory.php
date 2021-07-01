<?php

namespace Database\Factories;

use App\Models\Ftpvideogame;
use Illuminate\Database\Eloquent\Factories\Factory;

class FtpvideogameFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ftpvideogame::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'categoria' => $this->faker->word(), // password
            'descripcion' => $this->faker->paragraph(),
            'online' => $this->faker->randomNumber(1, true),
        ];
    }
}
