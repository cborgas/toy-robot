<?php

namespace ToyRobot;

use ToyRobot\App\Output;
use ToyRobot\Command\Receiver;

abstract class Command
{
    protected Receiver $receiver;

    protected Output $output;

    protected array $args;

    public function __construct(Output $output, Receiver $receiver, ...$args)
    {
        $this->receiver = $receiver;
        $this->output = $output;
        $this->args = $args;
    }

    abstract public function execute(): void;
}
