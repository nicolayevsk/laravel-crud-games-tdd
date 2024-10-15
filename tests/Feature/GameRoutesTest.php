<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Game;

class GameRoutesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_access_the_game_index_page()
    {
        $response = $this->get('/games'); // Faz uma requisição GET para acessar a página de índice dos jogos
        $response->assertStatus(200); // Verifica se a resposta foi bem-sucedida (200 OK)
    }

    /** @test */
    public function it_can_access_the_game_create_page()
    {
        $response = $this->get('/games/create'); // Faz uma requisição GET para acessar a página de criação de jogos
        $response->assertStatus(200); // Verifica se a resposta foi bem-sucedida (200 OK)
    }

    /** @test */
    public function it_can_store_a_new_game()
    {
        $gameData = [
            'title' => 'Test Game',
            'description' => 'Test Description',
        ];

        $response = $this->post('/games', $gameData); // Faz uma requisição POST para armazenar um novo jogo
        $response->assertRedirect('/games'); // Verifica se redireciona para a lista de jogos
        $this->assertDatabaseHas('games', ['title' => 'Test Game']); // Confirma se o jogo foi adicionado ao banco de dados
    }

    /** @test */
    public function it_can_access_the_game_edit_page()
    {
        $game = Game::factory()->create(); // Cria um jogo usando a factory
        $response = $this->get("/games/{$game->id}/edit"); // Faz uma requisição GET para acessar a página de edição do jogo
        $response->assertStatus(200); // Verifica se a resposta foi bem-sucedida (200 OK)
    }

    /** @test */
    public function it_can_update_a_game()
    {
        $game = Game::factory()->create(); // Cria um jogo usando a factory
        $updatedData = [
            'title' => 'Updated Title',
            'description' => 'Updated Description',
        ];

        $response = $this->put("/games/{$game->id}", $updatedData); // Faz uma requisição PUT para atualizar o jogo
        $response->assertRedirect('/games'); // Verifica se redireciona para a lista de jogos
        $this->assertDatabaseHas('games', ['title' => 'Updated Title']); // Confirma se o jogo foi atualizado no banco de dados
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
