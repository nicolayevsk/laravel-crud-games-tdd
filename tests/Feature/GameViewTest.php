<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Game;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Factory as Faker;

class GameViewTest extends TestCase // Define a classe de teste para as views de jogos
{
    use RefreshDatabase; // Aplica a trait para reiniciar o banco de dados entre os testes

    /** @test */
    public function test_game_index_view_is_rendered() // Testa se a view de índice de jogos é renderizada
    {
        $response = $this->get(route('games.index')); // Faz uma requisição GET para a rota de índice

        $response->assertStatus(200); // Verifica se o status da resposta é 200 (OK)
        $response->assertViewIs('games.index'); // Verifica se a view retornada é a 'games.index'
        $response->assertSee('Games'); // Verifica se o texto 'Games' está presente na resposta
    }

    /** @test */
    public function test_game_create_view_is_rendered() // Testa se a view de criação de jogos é renderizada
    {
        $response = $this->get(route('games.create')); // Faz uma requisição GET para a rota de criação

        $response->assertStatus(200); // Verifica se o status da resposta é 200 (OK)
        $response->assertViewIs('games.create'); // Verifica se a view retornada é a 'games.create'
        $response->assertSee('Add New Game'); // Verifica se o texto 'Add New Game' está presente na resposta
    }

    /** @test */
    public function test_game_show_view_contains_game_details() // Testa se a view de exibição de detalhes do jogo contém as informações do jogo
    {
        $faker = Faker::create(); // Cria uma instância do Faker

        $game = Game::factory()->create([ // Cria um jogo usando a factory
            'title' => $faker->sentence(),
            'description' => $faker->paragraph(),
        ]);

        $response = $this->get(route('games.show', $game->id)); // Faz uma requisição GET para a rota de exibição do jogo

        $response->assertStatus(200); // Verifica se o status da resposta é 200 (OK)
        $response->assertViewIs('games.show'); // Verifica se a view retornada é a 'games.show'
        $response->assertSee($game->title); // Verifica se o título do jogo está presente na resposta
        $response->assertSee($game->description); // Verifica se a descrição do jogo está presente na resposta
    }

    /** @test */
    public function test_game_edit_view_contains_game_details() // Testa se a view de edição do jogo contém as informações do jogo
    {
        $faker = Faker::create(); // Cria uma instância do Faker

        $game = Game::factory()->create([ // Cria um jogo usando a factory
            'title' => 'Edit Test Game',
            'description' => 'This is an edit test game.',
        ]);

        $response = $this->get(route('games.edit', $game->id)); // Faz uma requisição GET para a rota de edição do jogo

        $response->assertStatus(200); // Verifica se o status da resposta é 200 (OK)
        $response->assertViewIs('games.edit'); // Verifica se a view retornada é a 'games.edit'
        $response->assertSee('Edit Game: ' . $game->title); // Verifica se o título de edição do jogo está presente na resposta
        $response->assertSee($game->description); // Verifica se a descrição do jogo está presente na resposta
    }

    /** @test */
    public function test_game_show_view_contains_edit_and_delete_buttons() // Testa se a view de exibição do jogo contém os botões de edição e exclusão
    {
        $game = Game::factory()->create(); // Cria um jogo usando a factory

        $response = $this->get(route('games.show', $game->id)); // Faz uma requisição GET para a rota de exibição do jogo

        $response->assertStatus(200); // Verifica se o status da resposta é 200 (OK)
        $response->assertViewIs('games.show'); // Verifica se a view retornada é a 'games.show'
        $response->assertSee('Edit'); // Verifica se o botão 'Edit' está presente na resposta
        $response->assertSee('Delete'); // Verifica se o botão 'Delete' está presente na resposta
    }
}
