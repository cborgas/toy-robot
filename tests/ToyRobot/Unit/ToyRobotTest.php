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
    }

    /**
     * @test
     */
    public function can_set_and_get_toy_robot_position(): void
    {
        $toyRobot = new ToyRobot();
        $table = new Table();
        $position = new Position($table);
        $toyRobot->setPosition($position);
        $this->assertInstanceOf(Position::class, $toyRobot->getPosition());
    }

    /**
     * @test
     */
    public function can_set_and_get_toy_robot_direction(): void
    {
        $toyRobot = new ToyRobot();
        $northDirection = new Direction\North();
        $toyRobot->setDirection($northDirection);
        $this->assertInstanceOf(Direction\North::class, $toyRobot->getDirection());
    }
}
