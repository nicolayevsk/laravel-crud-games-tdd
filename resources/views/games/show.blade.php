@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-horizontal">
        <img src="{{ asset('assets/steam.jpg') }}" alt="{{ $game->title }}" width="40%">
        <div class="card-body">
            <h4 class="card-title mt-2">{{ $game->title }}</h4>
            <p class="card-text"><strong>Description:</strong> {{ $game->description }}</p>
            <p class="card-text"><strong>Price:</strong> R$ {{ number_format($game->price, 2, ',', '.') }}</p>
            <p class="card-text"><strong>Release Date:</strong> {{ date('d/M/Y', strtotime($game->release_date)) }}</p>

            <div class="platforms mb-3">
                Platforms:&nbsp;
                @if($game->is_windows)
                    <span class="platform_img win"></span>
                @endif
                @if($game->is_mac)
                    <span class="platform_img mac"></span>
                @endif
            </div>

            <div class="d-flex">
                <a href="{{ route('games.edit', $game->id) }}" class="btn btn-dark mx-1">Edit</a>

                <form action="{{ route('games.destroy', $game->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-dark mx-1">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<a href="{{ route('games.index') }}" class="btn btn-secondary mt-3">Back to List</a>
@endsection