<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;

class GameModelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_correct_database_schema()
    {
        // Verifica se a tabela 'games' possui as colunas esperadas
        $this->assertTrue(
            Schema::hasColumns('games', ['id', 'title', 'description', 'price', 'release_date', 'is_windows', 'is_mac'])
        );
    }
}
