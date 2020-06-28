<?php

namespace ToyRobot\App;

interface Output
{
    public function writeln(string $message): void;
}
