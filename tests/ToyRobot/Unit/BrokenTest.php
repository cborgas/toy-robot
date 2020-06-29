<?php

namespace ToyRobot\Unit;

class BrokenTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function broken_test()
    {
        $this->assertTrue(false);
    }
}
