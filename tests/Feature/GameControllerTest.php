<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Game;
use Faker\Factory as Faker;

class GameControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_game()
    {
        $faker = Faker::create(); // Cria uma instância do Faker

        $gameData = [
            'title' => $faker->sentence(3), // Gera um título aleatório com 3 palavras
            'description' => $faker->paragraph(), // Gera uma descrição aleatória
            'price' => $faker->randomFloat(2, 10, 1000), // Gera um preço aleatório entre 10 e 1000
            'release_date' => $faker->date(), // Gera uma data aleatória
            'is_windows' => $faker->boolean(), // Gera um booleano aleatório para Windows
            'is_mac' => $faker->boolean(), // Gera um booleano aleatório para Mac
        ];

        $response = $this->post('/games', $gameData); // Faz uma requisição POST para criar um novo jogo
        $response->assertRedirect('/games'); // Verifica se redireciona para a lista de jogos
        $this->assertDatabaseHas('games', ['title' => $gameData['title']]); // Confirma se o jogo foi adicionado ao banco de dados
    }

    /** @test */
    public function it_can_edit_a_game()
    {
        $game = Game::factory()->create(); // Cria um jogo usando a factory
        $faker = Faker::create(); // Cria uma instância do Faker

        $updatedData = [
            'title' => $faker->sentence(3), // Gera um título aleatório
            'description' => $faker->paragraph(), // Gera uma descrição aleatória
            'price' => $faker->randomFloat(2, 10, 1000), // Gera um preço aleatório
            'release_date' => $faker->date(), // Gera uma data aleatória
            'is_windows' => $faker->boolean(), // Gera um booleano aleatório
            'is_mac' => $faker->boolean(), // Gera um booleano aleatório
        ];

        $response = $this->put("/games/{$game->id}", $updatedData); // Faz uma requisição PUT para atualizar o jogo
        $response->assertRedirect('/games'); // Verifica se redireciona para a lista de jogos
        $this->assertDatabaseHas('games', ['title' => $updatedData['title']]); // Confirma se o jogo foi atualizado no banco de dados
    }

    /** @test */
    public function it_can_delete_a_game()
    {
        $game = Game::factory()->create(); // Cria um jogo usando a factory

        $response = $this->delete("/games/{$game->id}"); // Faz uma requisição DELETE para remover o jogo
        $response->assertRedirect('/games'); // Verifica se redireciona para a lista de jogos
        $this->assertDatabaseMissing('games', ['id' => $game->id]); // Confirma que o jogo foi removido do banco de dados
    }
}
