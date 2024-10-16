<?php

namespace Database\Factories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    protected $model = Game::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(), // Título aleatório
            'description' => $this->faker->paragraph(), // Descrição aleatório
            'price' => $this->faker->randomFloat(2, 10, 500), // Preço aleatório entre 10 e 500
            'release_date' => $this->faker->date(), // Data aleatória
            'is_windows' => $this->faker->boolean(), // Verdadeiro ou Falso para Windows
            'is_mac' => $this->faker->boolean(), // Verdadeiro ou Falso para Mac
        ];
    }
}
