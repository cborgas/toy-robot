<?php

namespace ToyRobot\Direction;

use ToyRobot\Direction\Context;
use ToyRobot\Position;

/**
 * A direction can turn left or right, or perform a move on a position.
 */
interface Direction
{
    /**
     * Turn right from this direction in the given context
     *
     * @param \ToyRobot\Direction\Context $context
     */
    public function turnRight(Context $context): void;

    /**
     * Turn left from this direction in the given context
     *
     * @param \ToyRobot\Direction\Context $context
     */
    public function turnLeft(Context $context): void;

    /**
     * Move in this direction from a given position
     *
     * @param Position $position
     * @param int $step
     */
    public function move(Position $position, int $step): void;

    /**
     * Get this direction as a lowercase string
     *
     * @return string
     * @example north
     */
    public function toSting(): string;
}
