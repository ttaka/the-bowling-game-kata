<?php
class BowlingGameTest extends PHPUnit_Framework_TestCase
{
    private $g;

    public function setUp()
    {
        $this->g = new Game();
    }

    private function rollMany($n, $pins)
    {
        for ($i = 0; $i < $n; $i++) {
            $this->g->roll($pins);
        }
    }

    public function testGutterGame()
    {
        $this->rollMany(20, 0);
        $this->assertEquals(0, $this->g->score());
    }

    public function testAllOnes()
    {
        $this->rollMany(20, 1);
        $this->assertEquals(20, $this->g->score());
    }
}
