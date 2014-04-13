<?php
/**
 * ボウリングのユニットテスト
 */
class GameTest extends PHPUnit_Framework_TestCase
{
    private $game;

    public function setUp()
    {
        $this->game = new Game();
    }

    private function rollRepeat($count, $pins)
    {
        for ($i = 0; $i < $count; $i++) {
            $this->game->roll($pins);
        }
    }

    /**
     * 一本も倒せなかった時
     */
    public function testAllZero()
    {
        $game = $this->game;

        $this->rollRepeat(20, 0);

        $this->assertEquals(0, $game->score());
    }

    /**
     * 毎回一本倒した時
     */
    public function testAllOne()
    {
        $game = $this->game;

        $this->rollRepeat(20, 1);

        $this->assertEquals(20, $game->score());
    }

    /**
     * スペアをとった時
     */
    public function testOneSpare()
    {
        $game = $this->game;

        $game->roll(1);
        $game->roll(9); // スペア

        $game->roll(2); // ボーナス点
        $game->roll(0);

        $this->rollRepeat(16, 0);

        $this->assertEquals(14, $game->score());
    }

    /**
     * スペアを連続してとった時
     */
    public function testTwoSpare()
    {
        $game = $this->game;

        $game->roll(1);
        $game->roll(9); // スペア

        $game->roll(2); // ボーナス点
        $game->roll(8); // スペア

        $game->roll(3); // ボーナス点
        $game->roll(0);

        $this->rollRepeat(14, 0);

        $this->assertEquals(28, $game->score());
    }

    /**
     * ストライクをとった時
     */
    public function testOneStrike()
    {
        $game = $this->game;

        $game->roll(10); // ストライク

        $game->roll(2); // ボーナス点
        $game->roll(3); // ボーナス点

        $this->rollRepeat(16, 0);

        $this->assertEquals(20, $game->score());
    }

    /**
     * ストライクを連続でとった時(ダブル)
     */
    public function testTwoStrike()
    {
        $game = $this->game;

        $game->roll(10); // ストライク

        $game->roll(10); // ストライク

        $game->roll(3); // ボーナス点
        $game->roll(4); // ボーナス点

        $this->rollRepeat(14, 0);

        $this->assertEquals(47, $game->score());
    }
}
