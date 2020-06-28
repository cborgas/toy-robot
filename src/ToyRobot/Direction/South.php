<?php

namespace ToyRobot\Direction;

use ToyRobot\Position;

class South implements Direction
{
    /**
     * @inheritDoc
     */
    public function toSting(): string
    {
        return 'south';
    }

    /**
     * When facing south, turning right will point west
     *
     * @inheritDoc
     */
    public function turnRight(Context $context): void
    {
        $context->setDirection(new West());
    }

    /**
     * When facing south, turning left will point east
     *
     * @inheritDoc
     */
    public function turnLeft(Context $context): void
    {
        $context->setDirection(new East());
    }

    /**
     * When facing south, moving will decrease the value of the position on the
     * y axis
     *
     * @inheritDoc
     */
    public function move(Position $position, int $step): void
    {
        $position->setY($position->getY() - $step);
    }
}
