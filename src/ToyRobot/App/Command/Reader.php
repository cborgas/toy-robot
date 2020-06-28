<?php

namespace ToyRobot\App\Command;

use ToyRobot\App;

/**
 * Fluent interface for reading commands
 */
interface Reader
{
    /**
     * @return App\Command
     * @throws NoMoreCommandsException
     */
    public function getNextCommand(): App\Command;
}
