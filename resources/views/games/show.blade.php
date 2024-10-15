@extends('layouts.app')

@section('content')
    <h1>{{ $game->title }}</h1>

    <p><strong>Description:</strong> {{ $game->description }}</p>
    <p><strong>Price:</strong> ${{ $game->price }}</p>

    <a href="{{ route('games.edit', $game->id) }}" class="btn btn-warning">Edit</a>

    <form action="{{ route('games.destroy', $game->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>

    <a href="{{ route('games.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
