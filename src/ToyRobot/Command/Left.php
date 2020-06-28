<?php

namespace ToyRobot\Command;

class Left extends \ToyRobot\Command
{
    /**
     * @inheritDoc
     */
    public function execute(): void
    {
        $this->receiver->directionContext->turnLeft();
    }
}
