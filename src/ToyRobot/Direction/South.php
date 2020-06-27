<?php

namespace ToyRobot\Direction;

use ToyRobot\Position;

class South implements Direction
{
    public function toSting(): string
    {
        return 'south';
    }

    /**
     * When facing south, turning right will point west
     *
     * @param Context $context
     */
    public function turnRight(Context $context): void
    {
        $context->setDirection(new West());
    }

    /**
     * When facing south, turning left will point east
     *
     * @param Context $context
     */
    public function turnLeft(Context $context): void
    {
        $context->setDirection(new East());
    }

    /**
     * When facing south, moving will decrease the value of the position on the
     * y axis
     *
     * @param Position $position
     * @param int $step
     */
    public function move(Position $position, int $step): void
    {
        $position->setY($position->getY() - $step);
    }
}
