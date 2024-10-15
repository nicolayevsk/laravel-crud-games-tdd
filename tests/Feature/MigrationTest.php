<?php

namespace Tests\Feature;

use Tests\TestCase;

class MigrationTest extends TestCase
{
    /** @test */
    public function it_has_correct_database_schema()
    {
        $this->assertTrue(
            \Schema::hasColumns('games', ['id', 'title', 'description', 'price'])
        );
    }
}
