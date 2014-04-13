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
        return array_sum($this->fallenPins);
    }
}
