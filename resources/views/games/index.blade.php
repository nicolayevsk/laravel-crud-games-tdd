@extends('layouts.app')

@section('content')
<h1>Games</h1>
<a href="{{ route('games.create') }}" class="btn btn-primary mb-3">Add Game</a>

<div class="row">
    @foreach($games as $game)
        <div class="col-md-10 mb-1">
            <a href="{{ route('games.show', $game->id) }}" class="card text-decoration-none text-dark">
                <div class="card-horizontal">
                    <div class="img-square-wrapper">
                        <img src="{{ asset('assets/steam.jpg') }}" alt="{{ $game->title }}" class="card-img-left">
                    </div>
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">{{ $game->title }}</h5>
                            <div class="platforms">
                                @if($game->is_windows)
                                    <span class="platform_img win"></span>
                                @endif
                                @if($game->is_mac)
                                    <span class="platform_img mac"></span>
                                @endif
                            </div>
                            <div>
                                <span>{{ $game->description }}</span>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex justify-content-end align-items-center">
                                <div class="price">
                                    <strong>R$ {{ number_format($game->price, 2, ',', '.') }}</strong>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <div class="release_date">{{ date('d/M/Y', strtotime($game->release_date)) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
@endsection