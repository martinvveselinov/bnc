<!-- resources/views/game/play.blade.php -->

@extends('layouts.app') <!-- You might have a common layout for your game -->

@section('content')
    <p>Guess the secret code!</p>
    <input type="hidden" id="username" value="{{$username}}">
    <input type="hidden" id="number" value="{{$number}}">
    <input type="hidden" id="win" value="0">

    <div id="score" style="display: none;">
        Score:
        <p>0</p>
    </div>


    <form id="guess-form" method="post">
        @csrf
        <input type="text" name="guess" id="guess" required>
        <button class="btn btn-primary" id="make-guess" role="button" type="submit">Guess</button>
    </form>
    <div id="result">

    </div>
    <!-- Display game feedback here -->
@endsection
