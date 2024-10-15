<?php

namespace Tests\Feature;

use Tests\TestCase;

class GameViewTest extends TestCase
{
    public function test_game_index_view_is_rendered()
    {
        $response = $this->get(route('games.index'));

        $response->assertStatus(200);
        $response->assertViewIs('games.index');
        $response->assertSee('Games');
    }

    public function test_game_create_view_is_rendered()
    {
        $response = $this->get(route('games.create'));

        $response->assertStatus(200);
        $response->assertViewIs('games.create');
        $response->assertSee('Add New Game');
    }

    public function test_game_show_view_contains_game_details()
    {
        $game = \App\Models\Game::factory()->create([
            'title' => 'Test Game',
            'description' => 'This is a test game.',
            'price' => 59.99,
        ]);

        $response = $this->get(route('games.show', $game->id));

        $response->assertStatus(200);
        $response->assertViewIs('games.show');
        $response->assertSee('Test Game');
        $response->assertSee('This is a test game.');
        $response->assertSee('$59.99');
    }

    public function test_game_edit_view_contains_game_details()
    {
        $game = \App\Models\Game::factory()->create([
            'title' => 'Edit Test Game',
            'description' => 'This is an edit test game.',
            'price' => 49.99,
        ]);

        $response = $this->get(route('games.edit', $game->id));

        $response->assertStatus(200);
        $response->assertViewIs('games.edit');
        $response->assertSee('Edit Game: Edit Test Game');
        $response->assertSee('This is an edit test game.');
        $response->assertSee('49.99');
    }

    public function test_game_show_view_contains_edit_and_delete_buttons()
    {
        $game = \App\Models\Game::factory()->create();

        $response = $this->get(route('games.show', $game->id));

        $response->assertStatus(200);
        $response->assertViewIs('games.show');
        $response->assertSee('Edit');
        $response->assertSee('Delete');
    }
}
