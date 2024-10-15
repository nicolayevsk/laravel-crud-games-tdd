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
        $response = $this->get('/games');
        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_access_the_game_create_page()
    {
        $response = $this->get('/games/create');
        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_store_a_new_game()
    {
        $gameData = [
            'title' => 'Test Game',
            'description' => 'Test Description',
            'price' => 29.99,
        ];

        $response = $this->post('/games', $gameData);
        $response->assertRedirect('/games');
        $this->assertDatabaseHas('games', ['title' => 'Test Game']);
    }

    /** @test */
    public function it_can_access_the_game_edit_page()
    {
        $game = Game::factory()->create();
        $response = $this->get("/games/{$game->id}/edit");
        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_update_a_game()
    {
        $game = Game::factory()->create();
        $updatedData = [
            'title' => 'Updated Title',
            'description' => 'Updated Description',
            'price' => 19.99,
        ];

        $response = $this->put("/games/{$game->id}", $updatedData);
        $response->assertRedirect('/games');
        $this->assertDatabaseHas('games', ['title' => 'Updated Title']);
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
