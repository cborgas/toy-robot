<?php

namespace ToyRobot\Unit;

use ToyRobot\Direction;
use ToyRobot\Position;
use ToyRobot\Table;
use ToyRobot\ToyRobot;

class ToyRobotTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function toy_robot_is_instantiable(): void
    {
        $toyRobot = new ToyRobot();
        $this->assertInstanceOf(\ToyRobot\ToyRobot::class, $toyRobot);
        $this->assertInstanceOf(\ToyRobot\Command\Receiver::class, $toyRobot);
    }

    /**
     * @test
     */
    public function can_set_and_get_toy_robot_position(): void
    {
        $toyRobot = new ToyRobot();
        $table = Table::create();
        $position = new Position($table);
        $toyRobot->position = $position;
        $this->assertInstanceOf(Position::class, $position);
    }

    /**
     * @test
     */
    public function can_set_and_get_toy_robot_direction(): void
    {
        $toyRobot = new ToyRobot();
        $directionContext = Direction\Context::create();
        $toyRobot->directionContext = $directionContext;
        $this->assertInstanceOf(
            Direction\Context::class,
            $toyRobot->directionContext
        );
    }
}
