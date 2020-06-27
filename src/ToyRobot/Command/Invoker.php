<?php

namespace ToyRobot\Command;

use ToyRobot\Command;

interface Invoker
{
    /**
     * @param Command $command
     */
    public function setCommand(Command $command): void;

    /**
     * Run the set command
     */
    public function run(): void;
}
