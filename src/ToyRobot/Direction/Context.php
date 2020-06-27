<?php

namespace ToyRobot\Direction;

use ToyRobot\Position;

class Context
{
    private Direction $direction;

    /**
     * Create a new context facing north
     *
     * @return Context
     */
    public static function create(): Context
    {
        $directionContext = new self();
        $directionContext->direction = new North();

        return $directionContext;
    }

    public function setDirection(Direction $direction): Context
    {
        $this->direction = $direction;

        return $this;
    }

    public function turnRight()
    {
        $this->direction->turnRight($this);
    }

    public function turnLeft()
    {
        $this->direction->turnLeft($this);
    }

    public function move(Position $position, int $step)
    {
        $this->direction->move($position, $step);
    }

    public function toString(): string
    {
        return $this->direction->toSting();
    }
}
