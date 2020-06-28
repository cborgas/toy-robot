<?php

namespace ToyRobot\Direction;

use ToyRobot\Position;

class North implements Direction
{
    /**
     * @inheritDoc
     */
    public function toSting(): string
    {
        return 'north';
    }

    /**
     * When facing north, turning right will point east
     *
     * @inheritDoc
     */
    public function turnRight(Context $context): void
    {
        $context->setDirection(new East());
    }

    /**
     * When facing north, turning left will point west
     *
     * @inheritDoc
     */
    public function turnLeft(Context $context): void
    {
        $context->setDirection(new West());
    }

    /**
     * When facing north, moving will increase the value of the position on the
     * y axis
     *
     * @inheritDoc
     */
    public function move(Position $position, int $step): void
    {
        $position->setY($position->getY() + $step);
    }
}
