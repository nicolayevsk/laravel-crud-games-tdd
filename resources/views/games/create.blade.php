@extends('layouts.app')

@section('content')
    <h1>Add New Game</h1>

    <form action="{{ route('games.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price:</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Game</button>
        <a href="{{ route('games.index') }}" class="btn btn-secondary">Back to List</a>
    </form>
@endsection
