@extends('layouts.app')

@section('content')
    <h1>Edit Game: {{ $game->title }}</h1>

    <form action="{{ route('games.update', $game->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" name="title" id="title" value="{{ $game->title }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea name="description" id="description" class="form-control">{{ $game->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update Game</button>
        <a href="{{ route('games.index') }}" class="btn btn-secondary">Back to List</a>
    </form>
@endsection
