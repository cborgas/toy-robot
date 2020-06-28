<?php

namespace ToyRobot\App;

class Command
{
    private string $command;

    private array $args = [];

    public function __construct(string $command)
    {
        $line = explode(' ', trim($command));
        $this->command = $line[0];

        if (!isset($line[1])) {
            return;
        }

        // Arguments are from the space onwards, separated by commas
        $this->args = explode(',', $line[1]);
    }

    public function getCommand(): string
    {
        return $this->command;
    }

    public function getArguments(): array
    {
        return $this->args;
    }
}
