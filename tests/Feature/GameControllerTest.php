<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Game;
use App\Repositories\GameRepository;
use Faker\Factory as Faker;
use Mockery;

class GameControllerTest extends TestCase
{
    /** @test */
    public function it_can_create_a_game()
    {
        $faker = Faker::create();

        $gameData = [
            'title' => $faker->sentence(3),
            'description' => $faker->paragraph(),
            'price' => $faker->randomFloat(2, 10, 1000),
            'release_date' => $faker->date(),
            'is_windows' => $faker->boolean(),
            'is_mac' => $faker->boolean(),
        ];

        // Mock do repositório para evitar interação com o banco
        $this->mock(GameRepository::class, function ($mock) use ($gameData) {
            $mock->shouldReceive('create')
                ->once()
                ->with($gameData)
                ->andReturn((object) $gameData); // Simula o retorno de um objeto após criação
        });

        // Faça a requisição POST
        $response = $this->post('/games', $gameData);

        // Verifique se redireciona
        $response->assertRedirect('/games');

        // Valide que o repositório foi chamado com os dados corretos
        $this->app[GameRepository::class]
            ->shouldHaveReceived('create')->with($gameData);
    }

    /** @test */
    public function it_can_edit_a_game()
    {
        $faker = Faker::create(); // Cria uma instância do Faker

        // Simula um jogo existente com makePartial() para permitir métodos como setAttribute()
        $game = Mockery::mock(Game::class)->makePartial();
        $game->id = 1;
        $game->title = $faker->sentence(3);
        $game->description = $faker->paragraph();
        $game->price = $faker->randomFloat(2, 10, 1000);
        $game->release_date = $faker->date();
        $game->is_windows = $faker->boolean();
        $game->is_mac = $faker->boolean();

        $updatedData = [
            'title' => $faker->sentence(3),
            'description' => $faker->paragraph(),
            'price' => $faker->randomFloat(2, 10, 1000),
            'release_date' => $faker->date(),
            'is_windows' => $faker->boolean(),
            'is_mac' => $faker->boolean(),
        ];

        // Mock do repositório para o findById e update
        $this->mock(GameRepository::class, function ($mock) use ($game, $updatedData) {
            $mock->shouldReceive('findById')
                ->once()
                ->with($game->id)
                ->andReturn($game); // Retorna o jogo ao buscar pelo ID

            $mock->shouldReceive('update')
                ->once()
                ->with($game, $updatedData)
                ->andReturn(true); // Simula a atualização do jogo
        });

        $response = $this->put("/games/{$game->id}", $updatedData); // Faz uma requisição PUT para atualizar o jogo
        $response->assertRedirect('/games'); // Verifica se redireciona para a lista de jogos

        // Valida que o repositório foi chamado com os dados corretos
        $this->app[GameRepository::class]
            ->shouldHaveReceived('update')->with($game, $updatedData);
    }

    /** @test */
    public function it_can_delete_a_game()
    {
        $faker = Faker::create(); // Cria uma instância do Faker

        // Simula um jogo existente com makePartial()
        $game = Mockery::mock(Game::class)->makePartial();
        $game->id = $faker->uuid();
        $game->title = $faker->sentence(3);
        $game->description = $faker->paragraph();

        // Mock do repositório para o findById e delete
        $this->mock(GameRepository::class, function ($mock) use ($game) {
            $mock->shouldReceive('findById')
                ->once()
                ->with($game->id)
                ->andReturn($game); // Retorna o jogo ao buscar pelo ID

            $mock->shouldReceive('delete')
                ->once()
                ->with($game)
                ->andReturn(true); // Simula a exclusão do jogo
        });

        $response = $this->delete("/games/{$game->id}"); // Faz uma requisição DELETE para remover o jogo
        $response->assertRedirect('/games'); // Verifica se redireciona para a lista de jogos

        // Valida que o repositório foi chamado com os dados corretos
        $this->app[GameRepository::class]
            ->shouldHaveReceived('delete')->with($game);
    }
}
