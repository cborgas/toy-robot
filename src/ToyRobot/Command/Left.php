<?php

namespace ToyRobot\Command;

class Left extends \ToyRobot\Command
{
    public function execute(): void
    {
        $this->receiver->directionContext->turnLeft();
    }
}
