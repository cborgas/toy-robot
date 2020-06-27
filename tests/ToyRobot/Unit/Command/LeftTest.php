<?php

namespace ToyRobot\Unit\Command;

use ToyRobot\Command;
use ToyRobot\Direction\North;

class LeftTest extends CommandTest
{
    /**
     * @test
     */
    public function left_command_is_instantiable()
    {
        $left = new Command\Left(self::$output, self::$receiver);
        $this->assertInstanceOf(Command\Left::class, $left);
    }

    /**
     * @test
     */
    public function receiver_turns_left()
    {
        self::$receiver->directionContext->setDirection(new North());
        $left = new Command\Left(self::$output, self::$receiver);
        $left->execute();
        $this->assertEquals('west', self::$receiver->directionContext->toString());
    }
}
