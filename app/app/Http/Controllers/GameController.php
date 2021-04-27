<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dice\Dice;
use App\Models\Dice\DiceHand;
use App\Models\Dice\GraphicalDice;

class GameController extends Controller
{
    /**
     * Display a message.
     *
     * @param  string  $message
     * @return \Illuminate\View\View
     */
    public function playGame($message=null)
    {
        session(['user' => 0]);
        session(['computer' => 0]);
        session(['score' => 0]);
        session(['compScore' => 0]);

        return view('game', [
            'game' => $message ?? "Hello World as default from within controller"
        ]);
    }

    public function startGame(Request $request)
    {
        $action = $request->action;

        if ($action === "start") {
            session(['dices' => $request->dices]);
            $hand = new DiceHand((int)session('dices'));
            $hand->roll();
            $sum = $hand->sum;
        } else if ($action === "Roll again") {
            $hand = new DiceHand((int)session('dices'));
            $hand->roll();
            $sum = $hand->sum;
        } else if ($action === "New round") {
            session(['score' => 0]);
            session(['compScore' => 0]);
            $hand = new DiceHand((int)session('dices'));
            $hand->roll();
            $sum = $hand->sum;
        } else if ($action === "Stop") {
            $score = $request->score;
            $compScore = $this->roll();
            $new = 0;

            if ($score > 21) {
                $new = $score - 21;
            }
            if ($score < 21) {
                $new = 21 - $score;
            }

            if (($score != 21 and $compScore == 21) or (($compScore - 21) < $new)) {
                $message = "The Computer won!";
                $current = session('computer');
                $current += 1;
                session(['computer' => $current]);
            } else {
                $message = "Congratulations, you won!";
                $current = session('user');
                $current += 1;
                session(['user' => $current]);
            }

            $sum = ("Computer score: "  . $compScore);

        } else if ($action === "Start over") {
            $request->session()->flush();
            return view('message', [
                'message' => "Play Game 21",
            ]);
        }

        return view('diceGame', [
            'message' => $message ?? "Play Game 21",
            'sum' => $sum ?? "def",
            'compScore' => $compScore ?? "def"
        ]);
    }

    public function roll(): int
    {
        $die = new Dice();
        $compScore = 0;

        while ($compScore < 21) {
            $die->roll();
            $compScore += $die->getLastRoll();
        }

        return $compScore;
    }
}