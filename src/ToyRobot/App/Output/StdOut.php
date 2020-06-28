<?php

namespace ToyRobot\App\Output;

use ToyRobot\App\Output;

class StdOut implements Output
{
    public function writeln(string $message): void
    {
        echo $message . PHP_EOL;
    }
}
