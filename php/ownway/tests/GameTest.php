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
}
