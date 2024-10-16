@extends('layouts.app')

@section('content')
<h1>Add New Game</h1>

<form action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mb-3">
        <label for="title" class="form-label">Title:</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description:</label>
        <textarea name="description" id="description" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label for="release_date" class="form-label">Release Date:</label>
        <input type="date" name="release_date" id="release_date" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price:</label>
        <input type="number" step="0.01" name="price" id="price" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Platforms:</label><br>

        <input type="hidden" name="is_windows" value="0">
        <div class="form-check form-check-inline">
            <input type="checkbox" name="is_windows" id="is_windows" class="form-check-input" value="1">
            <label for="is_windows" class="form-check-label">Windows</label>
        </div>

        <input type="hidden" name="is_mac" value="0">
        <div class="form-check form-check-inline">
            <input type="checkbox" name="is_mac" id="is_mac" class="form-check-input" value="1">
            <label for="is_mac" class="form-check-label">Mac</label>
        </div>
    </div>

    <button type="submit" class="btn btn-dark">Create Game</button>
    <a href="{{ route('games.index') }}" class="btn btn-dark">Back to List</a>
</form>
@endsection