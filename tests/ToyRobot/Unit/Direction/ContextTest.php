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
    public function direction_context_is_statically_instantiable()
    {
        $directionContext = Direction\Context::create();
        $this->assertInstanceOf(Direction\Context::class, $directionContext);
    }

    /**
     * @test
     */
    public function statically_instantiated_direction_is_facing_north()
    {
        $directionContext = Direction\Context::create();
        $this->assertEquals('north', $directionContext->toString());
    }

    /**
     * @test
     */
    public function can_set_direction_on_direction_context()
    {
        $directionContext = Direction\Context::create();
        $directionContext->setDirection(new Direction\West());
        $this->assertEquals('west', $directionContext->toString());
    }

    /**
     * @test
     */
    public function direction_context_can_turn_right()
    {
        $directionContext = Direction\Context::create();
        $directionContext->turnRight();
        $this->assertEquals('east', $directionContext->toString());
    }

    /**
     * @test
     */
    public function direction_context_can_turn_left()
    {
        $directionContext = Direction\Context::create();
        $directionContext->turnLeft();
        $this->assertEquals('west', $directionContext->toString());
    }

    /**
     * @test
     */
    public function direction_context_can_turn_right_seven_times()
    {
        $directionContext = Direction\Context::create();

        foreach(range(1,7) as $iteration) {
            $directionContext->turnRight();
        }

        $this->assertEquals('west', $directionContext->toString());
    }

    /**
     * @test
     */
    public function direction_context_can_turn_left_ten_times()
    {
        $directionContext = Direction\Context::create();

        foreach(range(1,10) as $iteration) {
            $directionContext->turnLeft();
        }

        $this->assertEquals('south', $directionContext->toString());
    }
}
