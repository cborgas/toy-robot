<?php

namespace ToyRobot\Direction;

use ToyRobot\Position;

class West implements Direction
{
    /**
     * @inheritDoc
     */
    public function toSting(): string
    {
        return 'west';
    }

    /**
     * When facing west, turning right will point north
     *
     * @inheritDoc
     */
    public function turnRight(Context $context): void
    {
        $context->setDirection(new North());
    }

    /**
     * When facing west, turning left will point south
     *
     * @inheritDoc
     */
    public function turnLeft(Context $context): void
    {
        $context->setDirection(new South());
    }

    /**
     * When facing west, moving will decrease the value of the position on the
     * x axis
     *
     * @inheritDoc
     */
    public function move(Position $position, int $step): void
    {
        $position->setX($position->getX() - $step);
    }
}
