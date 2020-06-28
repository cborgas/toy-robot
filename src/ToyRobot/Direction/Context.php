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

    public function turnRight(): void
    {
        $this->getDirection()->turnRight($this);
    }

    public function turnLeft(): void
    {
        $this->getDirection()->turnLeft($this);
    }

    public function move(Position $position, int $step): void
    {
        $this->getDirection()->move($position, $step);
    }

    public function toString(): string
    {
        return $this->getDirection()->toSting();
    }

    private function getDirection(): Direction
    {
        if (is_null($this->direction)) {
            throw new DirectionNotSetException();
        }

        return $this->direction;
    }
}
