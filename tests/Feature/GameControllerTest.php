<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Game;

class GameControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_game()
    {
        $gameData = [
            'title' => 'New Game',
            'description' => 'Game Description',
            'price' => 39.99,
        ];

        $response = $this->post('/games', $gameData); // Faz uma requisição POST para criar um novo jogo
        $response->assertRedirect('/games'); // Verifica se redireciona para a lista de jogos
        $this->assertDatabaseHas('games', ['title' => 'New Game']); // Confirma se o jogo foi adicionado ao banco de dados
    }

    /** @test */
    public function it_can_edit_a_game()
    {
        $game = Game::factory()->create(); // Cria um jogo usando a factory

        $updatedData = [
            'title' => 'Updated Game',
            'description' => 'Updated Description',
            'price' => 49.99,
        ];

        $response = $this->put("/games/{$game->id}", $updatedData); // Faz uma requisição PUT para atualizar o jogo
        $response->assertRedirect('/games'); // Verifica se redireciona para a lista de jogos
        $this->assertDatabaseHas('games', ['title' => 'Updated Game']); // Confirma se o jogo foi atualizado no banco de dados
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
