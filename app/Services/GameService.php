<?php

namespace App\Services;

use App\Models\UserScore;
use Illuminate\Http\Request;

class GameService
{
    public function startNewGame()
    {
        // Implement logic to initialize a new game
    }

    public function makeGuess(Request $request)
    {
        // Your code to handle user guesses and calculate the score
        $username = $request->input('username');
        $score = 42; // Replace with the actual score

        // Store the score in the database
        UserScore::create([
            'username' => $username,
            'score' => $score,
        ]);

        return redirect()->route('new-game'); // Redirect to start a new game or another appropriate page
    }

    public function displayScores()
    {
        // Retrieve user scores from the database
        $scores = UserScore::orderBy('score', 'asc')->get(); // Replace with your query logic

        return view('game.scores', ['scores' => $scores]); // Replace 'game.scores' with your actual view
    }

    public static function generateNumber() {
        $number = strval(rand(1000, 9999)); // Generate a random 4-digit number
        if(in_array($number[0], [4, 5]) || in_array($number[2], [4, 5])){
            return self::generateNumber();
        }
        else if (str_contains($number, '1') && str_contains($number, '8') &&
            !str_contains($number, '18') && !str_contains($number, '81')) {
                return self::generateNumber();
        }
        return $number;
    }

    public static function cowsAndBulls($guess, $secret) {
        // Ensure both the guess and secret are 4 digits long
        if (strlen($guess) !== 4 || strlen($secret) !== 4) {
            return '<p>Both guess and secret numbers should be 4 digits long.</p>';
        }

        $guessArray = str_split($guess);
        $secretArray = str_split($secret);

        $cows = 0;
        $bulls = 0;
        // 9999 , 7997 //
        for ($i = 0; $i < 4; $i++) {
            if ($guessArray[$i] === $secretArray[$i]) {
                $secretArray[$i] = "_";
                $bulls++;
            }

        }
        for ($i = 0; $i < 4; $i++) {
            $pos = array_search($guessArray[$i], $secretArray);
            if ($pos) {
                $secretArray[$pos] = "_";
                $cows++;
            }
        }

        if ($bulls === 4) {
            return true;
        }

        return '<p>Cows: ' . $cows . ', Bulls: ' . $bulls . ' ('. $guess. ')</p>';
    }
}
