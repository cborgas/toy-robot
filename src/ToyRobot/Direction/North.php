<?php

namespace ToyRobot\Direction;

use ToyRobot\Position;

class North implements Direction
{
    public function toSting(): string
    {
        return 'north';
    }

    /**
     * When facing north, turning right will point east
     *
     * @param Context $context
     */
    public function turnRight(Context $context): void
    {
        $context->setDirection(new East());
    }

    /**
     * When facing north, turning left will point west
     *
     * @param Context $context
     */
    public function turnLeft(Context $context): void
    {
        $context->setDirection(new West());
    }

    /**
     * When facing north, moving will increase the value of the position on the
     * y axis
     *
     * @param Position $position
     * @param int $step
     */
    public function move(Position $position, int $step): void
    {
        $position->setY($position->getY() + $step);
    }
}
