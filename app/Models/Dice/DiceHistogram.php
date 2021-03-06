<?php

namespace App\Models\Dice;

/**
 * A dice which has the ability to show a histogram.
 */
class DiceHistogram extends Dice
{
    use HistogramTrait;


    /**
     * Roll the dice, remember its value in the serie and return
     * its value.
     *
     * @return int the value of the rolled dice.
     */
    public function roll(): int
    {
        $this->serie[] = parent::roll();
        return $this->getLastRoll();
    }
}
