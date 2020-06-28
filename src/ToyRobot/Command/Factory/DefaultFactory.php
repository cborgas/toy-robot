<?php

namespace ToyRobot\Command\Factory;

use ToyRobot\App\Output;
use ToyRobot\Command;
use ToyRobot\Command\Receiver;

/**
 * Abstract TextFileReaderFactory for instantiating concrete commands
 */
class DefaultFactory implements Command\Factory
{
    protected Output $output;

    public function __construct(Output $output)
    {
        $this->output = $output;
    }

    /**
     * @inheritDoc
     */
    public function createCommand(Receiver $receiver, string $command, ...$args): Command
    {
        switch (strtolower($command)) {
            case 'place':
                return new Command\Place($this->output, $receiver, ...$args);
            case 'left':
                return new Command\Left($this->output, $receiver);
            case 'right':
                return new Command\Right($this->output, $receiver);
            case 'move':
                return new Command\Move($this->output, $receiver);
            case 'report':
                return new Command\Report($this->output, $receiver);
            default:
                throw new \InvalidArgumentException(
                    "Unknown command given: {$command}"
                );
        }
    }
}
