<?php

namespace ToyRobot\Unit\Mock;

use Symfony\Component\Console\Formatter\OutputFormatterInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Null object
 */
class Output implements OutputInterface
{
    public function write($messages, bool $newline = false, int $options = 0)
    {

    }

    public function writeln($messages, int $options = 0)
    {

    }

    public function setVerbosity(int $level)
    {

    }

    public function getVerbosity()
    {

    }

    public function isQuiet()
    {

    }

    public function isVerbose()
    {

    }

    public function isVeryVerbose()
    {

    }

    public function isDebug()
    {

    }

    public function setDecorated(bool $decorated)
    {

    }

    public function isDecorated()
    {

    }

    public function setFormatter(OutputFormatterInterface $formatter)
    {

    }

    public function getFormatter()
    {

    }
}
