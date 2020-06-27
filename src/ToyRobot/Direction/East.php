<?php

namespace ToyRobot\Direction;

use ToyRobot\Position;

class East implements Direction
{
    public function toSting(): string
    {
        return 'east';
    }

    /**
     * When facing east, turning right will point south
     *
     * @param Context $context
     */
    public function turnRight(Context $context): void
    {
        $context->setDirection(new South());
    }

    /**
     * When facing west, turning left will point south
     *
     * @param Context $context
     */
    public function turnLeft(Context $context): void
    {
        $context->setDirection(new North());
    }

    /**
     * When facing east, moving will increase the value of the position on the
     * x axis
     *
     * @param Position $position
     * @param int $step
     */
    public function move(Position $position, int $step): void
    {
        $position->setX($position->getX() + $step);
    }
}
