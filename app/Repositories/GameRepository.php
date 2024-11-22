<?php

namespace App\Repositories;

use App\Models\Game;

class GameRepository
{
    /**
     * Retorna todos os jogos
     */
    public function getAll()
    {
        return Game::all();
    }

    /**
     * Cria um novo jogo
     */
    public function create(array $data)
    {
        return Game::create($data);
    }

    /**
     * Busca um jogo por ID
     */
    public function findById(int $id)
    {
        return Game::findOrFail($id);
    }

    /**
     * Atualiza um jogo existente
     */
    public function update(Game $game, array $data)
    {
        return $game->update($data);
    }

    /**
     * Deleta um jogo
     */
    public function delete(Game $game)
    {
        return $game->delete();
    }
}
