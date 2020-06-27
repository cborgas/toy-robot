<?php

namespace ToyRobot\Command;

class Right extends \ToyRobot\Command
{
    public function execute(): void
    {
        $this->receiver->directionContext->turnRight();
    }
}
