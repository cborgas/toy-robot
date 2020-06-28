<?php

namespace ToyRobot\Direction;

/**
 * Static Factory for instantiating concrete directions
 */
class Factory
{
    /**
     * Instantiate a concrete direction based on a given type
     *
     * @param string $direction North, South, East or West
     * @return Direction
     */
    public static function factory(string $direction): Direction
    {
        switch (strtolower($direction)) {
            case 'north':
                return new North();
            case 'south':
                return new South();
            case 'east':
                return new East();
            case 'west':
                return new West();
            default:
                throw new \InvalidArgumentException(
                    'Unknown direction given'
                );
        }
    }
}
