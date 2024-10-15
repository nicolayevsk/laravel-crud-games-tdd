@extends('layouts.app')

@section('content')
    <h1>Games</h1>
    <a href="{{ route('games.create') }}" class="btn btn-primary mb-3">Add Game</a>
    
    <ul class="list-group">
        @foreach($games as $game)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('games.show', $game->id) }}">{{ $game->title }}</a>

                <div>
                    <a href="{{ route('games.edit', $game->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('games.destroy', $game->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
