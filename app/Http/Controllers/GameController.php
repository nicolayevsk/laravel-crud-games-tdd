<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\GameRepository;

class GameController extends Controller
{
    protected $gameRepository;

    public function __construct(GameRepository $gameRepository)
    {
        $this->gameRepository = $gameRepository;
    }

    public function index()
    {
        $games = $this->gameRepository->getAll();
        return view('games.index', compact('games'));
    }

    public function create()
    {
        return view('games.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'release_date' => 'required|date',
            'is_windows' => 'boolean',
            'is_mac' => 'boolean',
        ]);

        $this->gameRepository->create($validated);

        return redirect()->route('games.index');
    }

    public function show($id)
    {
        $game = $this->gameRepository->findById($id);
        return view('games.show', compact('game'));
    }

    public function edit($id)
    {
        $game = $this->gameRepository->findById($id);
        return view('games.edit', compact('game'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'release_date' => 'required|date',
            'is_windows' => 'boolean',
            'is_mac' => 'boolean',
        ]);

        $game = $this->gameRepository->findById($id);
        $this->gameRepository->update($game, $validated);

        return redirect()->route('games.index');
    }

    public function destroy($id)
    {
        $game = $this->gameRepository->findById($id);
        $this->gameRepository->delete($game);

        return redirect()->route('games.index');
    }
}
