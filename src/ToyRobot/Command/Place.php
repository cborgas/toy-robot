<?php

namespace ToyRobot\Command;

use ToyRobot\Direction;

class Place extends \ToyRobot\Command
{
    public function execute(): void
    {
        $this->receiver->position->setX($this->getX());
        $this->receiver->position->setY($this->getY());
        $this->receiver->directionContext->setDirection($this->getDirection());
    }

    private function getDirection(): Direction\Direction
    {
        return Direction\StaticFactory::factory($this->args[2]);
    }

    private function getX(): int
    {
        return (int) $this->args[0];
    }

    private function getY(): int
    {
        return (int) $this->args[1];
    }
}
