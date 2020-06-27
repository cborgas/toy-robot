<?php

namespace ToyRobot\Unit\Direction;

use ToyRobot\Direction;

class SouthTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function can_get_string_from_south()
    {
        $directionContext = new Direction\Context();
        $directionContext->setDirection(new Direction\South());
        $this->assertEquals('south', $directionContext->toString());
    }

    /**
     * @test
     */
    public function south_turns_right_to_face_west()
    {
        $directionContext = new Direction\Context();
        $north = new Direction\South();
        $north->turnRight($directionContext);
        $this->assertEquals('west', $directionContext->toString());
    }

    /**
     * @test
     */
    public function south_turns_left_to_face_east()
    {
        $directionContext = new Direction\Context();
        $north = new Direction\South();
        $north->turnLeft($directionContext);
        $this->assertEquals('east', $directionContext->toString());
    }
}
