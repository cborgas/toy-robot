<?php

namespace ToyRobot\App;

interface Output
{
    /**
     * Write a message to a new line
     *
     * @param string $message
     * @return void
     */
    public function writeln(string $message): void;
}
