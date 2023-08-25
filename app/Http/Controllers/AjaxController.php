<?php

namespace App\Http\Controllers;


use App\Models\UserScore;
use App\Services\GameService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AjaxController extends Controller
{
    public function makeGuess(Request $request): bool|string
    {
        $guess = $request->input('guess');
        $username = $request->input('username');
        $score = $request->session()->get('current_game_' . $username . '_score');
        $request->session()->put('current_game_' . $username . '_score', $score+1);
        $secret = $request->session()->get('current_game_' . $username);
        $result = GameService::cowsAndBulls($guess, $secret[0]);
        $isCorrect = ($guess == $secret[0]);
        if($isCorrect){
            UserScore::create([
                'username' => $username,
                'score' => $score,
            ]);
        }
        $response = [
            'message' => $isCorrect ? [1, 'Congratulations! You guessed it! (' . $guess . ')', $secret] : [0, $result, $secret],
        ];
        return json_encode($response);
    }

}
