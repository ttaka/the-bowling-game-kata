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
        $latestPins = 0;
        $isFirstRoll = true; // フレームの一投目なら真
        $isSpareBonus = false;

        foreach ($this->fallenPins as $pins) {
            if ($isSpareBonus) {
                $score += $pins;
                $isSpareBonus = false;
            }

            if ($isFirstRoll) {
                $isFirstRoll = false;
            } else {
                if (($pins + $latestPins) == 10) {
                    $isSpareBonus = true;
                }
                $isFirstRoll = true;
            }

            $score += $pins;
            $latestPins = $pins;
        }

        return $score;
    }
}
