<?php

namespace ToyRobot\Unit\Command;

use ToyRobot\Command;
use ToyRobot\Direction\North;

class RightTest extends CommandTest
{
    /**
     * @test
     */
    public function right_command_is_instantiable()
    {
        $left = new Command\Right(self::$output, self::$receiver);
        $this->assertInstanceOf(Command\Right::class, $left);
    }

    /**
     * @test
     */
    public function receiver_turns_right()
    {
        self::$receiver->directionContext->setDirection(new North());
        $left = new Command\Right(self::$output, self::$receiver);
        $left->execute();
        $this->assertEquals('east', self::$receiver->directionContext->toString());
    }
}
