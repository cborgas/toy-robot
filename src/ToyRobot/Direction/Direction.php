<?php

namespace ToyRobot\Direction;

use ToyRobot\Direction\Context;
use ToyRobot\Position;

/**
 * A direction can turn left or right
 */
interface Direction
{
    public function turnRight(Context $context): void;

    public function turnLeft(Context $context): void;

    public function move(Position $position, int $step): void;

    public function toSting(): string;
}
