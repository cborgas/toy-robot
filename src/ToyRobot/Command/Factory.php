<?php

namespace ToyRobot\Command;

use ToyRobot\Command;

/**
 * Factory Method pattern for creating commands
 */
interface Factory
{
    public function createCommand(Receiver $receiver, string $command, ...$args): Command;
}
