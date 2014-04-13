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

    public function testOneSpare()
    {
        $this->rollSpare();
        $this->g->roll(3);
        $this->rollMany(17, 0);
        $this->assertEquals(16, $this->g->score());
    }

    public function testOneStrike()
    {
        $this->g->roll(10); // strike
        $this->g->roll(3);
        $this->g->roll(4);
        $this->rollMany(16, 0);
        $this->assertEquals(24, $this->g->score());
    }

    private function rollSpare()
    {
        $this->g->roll(5);
        $this->g->roll(5);
    }
}
