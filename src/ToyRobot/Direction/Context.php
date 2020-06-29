<?php

namespace ToyRobot\Direction;

use ToyRobot\Exception\Context\DirectionNotSetException;
use ToyRobot\Position;

class Context
{
    private ?Direction $direction = null;

    /**
     * @param Direction $direction
     * @return $this
     */
    public function setDirection(Direction $direction): Context
    {
        $this->direction = $direction;

        return $this;
    }

    public function toString(): string
    {
        return $this->getDirection()->toSting();
    }

    public function getDirection(): Direction
    {
        if (is_null($this->direction)) {
            throw new DirectionNotSetException();
        }

        return $this->direction;
    }
}
