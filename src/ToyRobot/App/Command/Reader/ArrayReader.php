<?php

namespace ToyRobot\App\Command\Reader;

use ToyRobot\App;

/**
 * Get commands from an array where each array value is a command string
 */
class ArrayReader implements App\Command\Reader
{
    private int $currentCommandPosition = 0;

    private array $commands;

    public function __construct(array $commands)
    {
        $this->commands = $commands;
    }

    public function getNextCommand(): App\Command
    {
        $command = $this->getCurrentCommand();

        $this->currentCommandPosition++;

        return $command;
    }

    private function getCurrentCommand(): App\Command
    {
        if (!isset($this->commands[$this->currentCommandPosition])) {
            throw new App\Command\NoMoreCommandsException();
        }

        $command = $this->commands[$this->currentCommandPosition];

        return new App\Command($command);
    }
}
