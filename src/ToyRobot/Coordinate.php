<?php

namespace ToyRobot;

interface Coordinate
{
    public function getX(): int;

    public function setX(int $x): Coordinate;

    public function getY(): int;

    public function setY(int $y): Coordinate;
}
