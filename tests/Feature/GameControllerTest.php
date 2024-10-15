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

        $response = $this->post('/games', $gameData);
        $response->assertRedirect('/games');
        $this->assertDatabaseHas('games', ['title' => 'New Game']);
    }

    /** @test */
    public function it_can_edit_a_game()
    {
        $game = Game::factory()->create();

        $updatedData = [
            'title' => 'Updated Game',
            'description' => 'Updated Description',
            'price' => 49.99,
        ];

        $response = $this->put("/games/{$game->id}", $updatedData);
        $response->assertRedirect('/games');
        $this->assertDatabaseHas('games', ['title' => 'Updated Game']);
    }

    /** @test */
    public function it_can_delete_a_game()
    {
        $game = Game::factory()->create();

        $response = $this->delete("/games/{$game->id}");
        $response->assertRedirect('/games');
        $this->assertDatabaseMissing('games', ['id' => $game->id]);
    }
}
