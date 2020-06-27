<?php

namespace ToyRobot\Unit\Direction;

use ToyRobot\Direction;

class EastTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function can_get_string_from_east()
    {
        $directionContext = new Direction\Context();
        $directionContext->setDirection(new Direction\East());
        $this->assertEquals('east', $directionContext->toString());
    }

    /**
     * @test
     */
    public function east_turns_right_to_face_south()
    {
        $directionContext = new Direction\Context();
        $north = new Direction\East();
        $north->turnRight($directionContext);
        $this->assertEquals('south', $directionContext->toString());
    }

    /**
     * @test
     */
    public function east_turns_left_to_face_north()
    {
        $directionContext = new Direction\Context();
        $north = new Direction\East();
        $north->turnLeft($directionContext);
        $this->assertEquals('north', $directionContext->toString());
    }
}
