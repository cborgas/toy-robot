<?php

namespace ToyRobot\Command;

class Right extends \ToyRobot\Command
{
    /**
     * @inheritDoc
     */
    public function execute(): void
    {
        $this->receiver->directionContext->getDirection()
            ->turnRight($this->receiver->directionContext);
    }
}
