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

    /**
     * 一本も倒せなかった時
     */
    public function testAllZero()
    {
        $game = $this->game;

        for ($i = 1; $i <= 20; $i++) {
            $game->roll(0);
        }

        $this->assertEquals(0, $game->score());
    }

    /**
     * 毎回一本倒した時
     */
    public function testAllOne()
    {
        $game = $this->game;

        for ($i = 1; $i <= 20; $i++) {
            $game->roll(1);
        }

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

        for ($i = 5; $i <= 20; $i++) {
            $game->roll(0);
        }

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

        for ($i = 7; $i <= 20; $i++) {
            $game->roll(0);
        }

        $this->assertEquals(28, $game->score());
    }
}
