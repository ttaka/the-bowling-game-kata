<?php
class BowlingGameTest extends PHPUnit_Framework_TestCase
{
    public function testGutterGame()
    {
        $g = new Game();
        for ($i = 0; $i < 20; $i++) {
            $g->roll(0);
        }
        $this->assertEquals(0, $g->score());
    }
}
