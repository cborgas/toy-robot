<?php

namespace ToyRobot\Command;

use ToyRobot\Command;

/**
 * Factory Method pattern for creating commands
 */
interface Factory
{
    /**
     * Instantiate a command from a string and optionally given arguments
     *
     * @param Receiver $receiver
     * @param string $command
     * @param mixed ...$args Command arguments
     * @return Command
     */
    public function createCommand(Receiver $receiver, string $command, ...$args): Command;
}
