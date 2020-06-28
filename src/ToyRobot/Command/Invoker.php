<?php

namespace ToyRobot\Command;

use LogicException;
use ToyRobot\Command;

abstract class Invoker
{
    protected Factory $commandFactory;

    protected Receiver $receiver;

    /**
     * @param string $command
     * @param mixed ...$args
     */
    final protected function execute(string $command, ...$args): void
    {
        try {
            $command = $this->commandFactory->createCommand($this->receiver, $command, ...$args);
            $command->execute();
        } catch (LogicException $exception) {
            // Ignore logic exceptions
        }
    }
}
