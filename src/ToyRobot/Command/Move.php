<?php

namespace ToyRobot\Command;

class Move extends \ToyRobot\Command
{
    public const NUMBER_OF_STEPS = 1;

    public function execute(): void
    {
        $this->receiver->directionContext->move(
            $this->receiver->position, self::NUMBER_OF_STEPS
        );
    }
}
