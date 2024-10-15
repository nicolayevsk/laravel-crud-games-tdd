<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Game;

class GameModelTest extends TestCase
{
    /** @test */
    public function it_has_fillable_properties()
    {
        $game = new Game(); // Cria uma nova instância do modelo Game
        $this->assertEquals(['title', 'description', 'price'], $game->getFillable()); // Verifica se as propriedades preenchíveis estão corretas
    }
}
