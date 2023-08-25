<!-- resources/views/game/scores.blade.php -->

@extends('layouts.app') <!-- You might have a common layout for your game -->

@section('content')
    <h1>User Scores</h1>

    <table>
        <thead>
        <tr>
            <th>Username</th>
            <th>Score</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($scores as $score)
            <tr>
                <td>{{ $score->username }}</td>
                <td>{{ $score->score }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
