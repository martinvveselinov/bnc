<?php

namespace App\Http\Controllers;

use App\Models\UserScore;
use App\Services\GameService;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function startNewGame()
    {
        $number = GameService::generateNumber();

        // Your code to initialize a new game
        return view('game.start'); // Replace 'game.start' with your actual view
    }

    public function playGame(Request $request)
    {
        // Your code to handle user guesses and calculate the score
        $username = $request->input('username');
        //$score = 42; // Replace with the actual score

        // Store the score in the database
        /**/
        $number = GameService::generateNumber();
        $request->session()->put('current_game_' . $username, [$number, $username]);
        $request->session()->put('current_game_' . $username . '_score', 0);

        return view('game.play')
            ->with('username', $username)
            ->with('number', $number);
//        return redirect()->route('make-guess'); // Redirect to start a new game or another appropriate page
    }

    public function makeGuess(Request $request)
    {
        // Your code to handle user guesses and calculate the score
        $username = $request->input('username');
        //$score = 42; // Replace with the actual score

        // Store the score in the database
        /*UserScore::create([
            'username' => $username,
            'score' => $score,
        ]);*/
        $number = GameService::generateNumber();
        return view('game.play')
            ->with('user', $username)
            ->with('number', $number);
//        return redirect()->route('make-guess'); // Redirect to start a new game or another appropriate page
    }

    public function displayScores()
    {
        // Retrieve user scores from the database
        $scores = UserScore::orderBy('score', 'asc')->take(10)->get(); // Replace with your query logic

        return view('game.scores', ['scores' => $scores]); // Replace 'game.scores' with your actual view
    }
}
