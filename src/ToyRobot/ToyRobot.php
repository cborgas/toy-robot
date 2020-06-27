<?php

namespace ToyRobot;

class ToyRobot
{
    private Position $position;

    private Direction $direction;

    public function setPosition(Position $position): ToyRobot
    {
        $this->position = $position;
        return $this;
    }

    public function getPosition(): Position
    {
        return $this->position;
    }

    public function setDirection(Direction $direction): ToyRobot
    {
        $this->direction = $direction;
        return $this;
    }

    public function getDirection(): Direction
    {
        return $this->direction;
    }
}
