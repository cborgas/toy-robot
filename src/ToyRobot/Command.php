<?php

namespace ToyRobot;

use Symfony\Component\Console\Output\OutputInterface;
use ToyRobot\Command\Receiver;

abstract class Command
{
    protected Receiver $receiver;

    protected OutputInterface $output;

    protected array $args;

    public function __construct(OutputInterface $output, Receiver $receiver, ...$args)
    {
        $this->receiver = $receiver;
        $this->output = $output;
        $this->args = $args;
    }

    abstract public function execute(): void;
}
