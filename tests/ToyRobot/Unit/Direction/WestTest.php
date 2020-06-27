<?php

namespace ToyRobot\Unit\Direction;

use ToyRobot\Direction;

class WestTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function can_get_string_from_west()
    {
        $directionContext = new Direction\Context();
        $directionContext->setDirection(new Direction\West());
        $this->assertEquals('west', $directionContext->toString());
    }

    /**
     * @test
     */
    public function west_turns_right_to_face_north()
    {
        $directionContext = new Direction\Context();
        $north = new Direction\West();
        $north->turnRight($directionContext);
        $this->assertEquals('north', $directionContext->toString());
    }

    /**
     * @test
     */
    public function west_turns_left_to_face_south()
    {
        $directionContext = new Direction\Context();
        $north = new Direction\West();
        $north->turnLeft($directionContext);
        $this->assertEquals('south', $directionContext->toString());
    }
}
