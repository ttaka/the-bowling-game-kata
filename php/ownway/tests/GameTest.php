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
}
