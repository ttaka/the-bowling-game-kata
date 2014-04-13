<?php
/**
 * ボウリング
 */
class Game
{
    private $fallenPins = array(); // 投球毎の倒したピンの数

    /**
     * 投球
     *
     * @param int $pins 倒したピンの数
     */
    public function roll($pins)
    {
        $this->fallenPins[] = $pins;
    }

    /**
     * スコア計算
     *
     * @return int ゲームの最終スコア
     */
    public function score()
    {
        $score = 0;
        $current = 0;
        $pins = $this->fallenPins;

        for ($frame = 1; $frame <= 10; $frame++) {
            if (($pins[$current] + $pins[$current + 1]) == 10) {
                $score += 10 + $pins[$current + 2];
                $current += 2;
            } else {
                $score += $pins[$current] + $pins[$current + 1];
                $current += 2;
            }
        }

        return $score;
    }
}
