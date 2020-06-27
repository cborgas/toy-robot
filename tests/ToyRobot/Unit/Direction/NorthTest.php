<?php

namespace ToyRobot\Unit\Direction;

use ToyRobot\Direction;

class NorthTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function can_get_string_from_north()
    {
        $directionContext = new Direction\Context();
        $directionContext->setDirection(new Direction\North());
        $this->assertEquals('north', $directionContext->toString());
    }

    /**
     * @test
     */
    public function north_turns_right_to_face_east()
    {
        $directionContext = new Direction\Context();
        $north = new Direction\North();
        $north->turnRight($directionContext);
        $this->assertEquals('east', $directionContext->toString());
    }

    /**
     * @test
     */
    public function north_turns_left_to_face_west()
    {
        $directionContext = new Direction\Context();
        $north = new Direction\North();
        $north->turnLeft($directionContext);
        $this->assertEquals('west', $directionContext->toString());
    }
}
