<?php
class Game
{
    private $rolls = array();

    public function roll($pins)
    {
        $this->rolls[] = $pins;
    }

    public function score()
    {
        $score = 0;
        $i = 0;
        for ($frame = 0; $frame < 10; $frame++) {
            if (($this->rolls[$i] + $this->rolls[$i+1]) == 10) { // spare
                $score += 10 + $this->rolls[$i+2];
                $i += 2;
            } else {
                $score += $this->rolls[$i] + $this->rolls[$i+1];
                $i += 2;
            }
        }
        return $score;
    }
}
