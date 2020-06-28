<?php

namespace ToyRobot\Unit\Mock;

/**
 * Null object
 */
class Output implements \ToyRobot\App\Output
{
    public function writeln(string $message): void
    {
        // Do nothing
    }
}
