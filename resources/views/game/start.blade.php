<!-- resources/views/game/start.blade.php -->

@extends('layouts.app') <!-- You might have a common layout for your game -->

@section('content')
    <h1>Start a New Game</h1>

    <form method="post" action="{{ route('play-game') }}">
        @csrf
        <label for="username">Enter your username:</label>
        <input type="text" name="username" id="username" required>
        <button type="submit">Start Game</button>
    </form>
@endsection
