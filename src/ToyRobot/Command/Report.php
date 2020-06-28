<?php

namespace ToyRobot\Command;

class Report extends \ToyRobot\Command
{
    /**
     * @inheritDoc
     */
    public function execute(): void
    {
        $x = $this->receiver->position->getX();
        $y = $this->receiver->position->getY();
        $direction = $this->receiver->directionContext->toString();

        $this->output->writeln(strtoupper("{$x},{$y},{$direction}"));
    }
}
