<?php

namespace ToyRobot\Table;

use ToyRobot\Coordinate;

class Origin implements Coordinate
{
    public const DEFAULT_X = 0;

    public const DEFAULT_Y = 0;

    private int $x = self::DEFAULT_X;

    private int $y = self::DEFAULT_Y;

    public function getX(): int
    {
        return $this->x;
    }

    public function setX(int $x): Origin
    {
        $this->x = $x;

        return $this;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function setY(int $y): Origin
    {
        $this->y = $y;

        return $this;
    }
}
