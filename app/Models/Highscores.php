<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Highscores extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function getHighscores()
    {
        $scores = [];

        foreach (Highscores::orderBy('score', 'DESC')->get() as $score) {
            array_push($scores, [
                'name' => $score->name,
                'score' => $score->score,
            ]);
        }

        return array_slice($scores, 0, 10);
    }
}