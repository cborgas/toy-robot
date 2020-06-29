<?php

namespace ToyRobot\Unit\Direction;

use ToyRobot\Direction;

class ContextTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function direction_context_is_instantiable()
    {
        $directionContext = new Direction\Context();
        $this->assertInstanceOf(Direction\Context::class, $directionContext);
    }

    /**
     * @test
     */
    public function statically_instantiated_direction_is_facing_north()
    {
        $directionContext = (new Direction\Context())->setDirection(new Direction\North());
        $this->assertEquals('north', $directionContext->toString());
    }

    /**
     * @test
     */
    public function can_set_direction_on_direction_context()
    {
        $directionContext = (new Direction\Context())->setDirection(new Direction\North());
        $directionContext->setDirection(new Direction\West());
        $this->assertEquals('west', $directionContext->toString());
    }

    /**
     * @test
     */
    public function direction_context_can_turn_right()
    {
        $directionContext = (new Direction\Context())->setDirection(new Direction\North());
        $directionContext->getDirection()->turnRight($directionContext);
        $this->assertEquals('east', $directionContext->toString());
    }

    /**
     * @test
     */
    public function direction_context_can_turn_left()
    {
        $directionContext = (new Direction\Context())->setDirection(new Direction\North());
        $directionContext->getDirection()->turnLeft($directionContext);
        $this->assertEquals('west', $directionContext->toString());
    }

    /**
     * @test
     */
    public function direction_context_can_turn_right_seven_times()
    {
        $directionContext = (new Direction\Context())->setDirection(new Direction\North());

        foreach(range(1,7) as $iteration) {
            $directionContext->getDirection()->turnRight($directionContext);
        }

        $this->assertEquals('west', $directionContext->toString());
    }

    /**
     * @test
     */
    public function direction_context_can_turn_left_ten_times()
    {
        $directionContext = (new Direction\Context())->setDirection(new Direction\North());

        foreach(range(1,10) as $iteration) {
            $directionContext->getDirection()->turnLeft($directionContext);
        }

        $this->assertEquals('south', $directionContext->toString());
    }
}
