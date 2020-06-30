<?php

namespace ToyRobot\Unit\Mock;

use Symfony\Component\Console\Formatter\OutputFormatterInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Null object
 */
class Output implements OutputInterface
{
    private string $writelnMessage;

    public function writeln($messages, int $options = 0): void
    {
        $this->writelnMessage = $messages;
    }

    public function getWritelnMessage(): string
    {
        return $this->writelnMessage;
    }

    public function write($messages, bool $newline = false, int $options = 0)
    {
        // TODO: Implement write() method.
    }

    public function setVerbosity(int $level)
    {
        // TODO: Implement setVerbosity() method.
    }

    public function getVerbosity()
    {
        // TODO: Implement getVerbosity() method.
    }

    public function isQuiet()
    {
        // TODO: Implement isQuiet() method.
    }

    public function isVerbose()
    {
        // TODO: Implement isVerbose() method.
    }

    public function isVeryVerbose()
    {
        // TODO: Implement isVeryVerbose() method.
    }

    public function isDebug()
    {
        // TODO: Implement isDebug() method.
    }

    public function setDecorated(bool $decorated)
    {
        // TODO: Implement setDecorated() method.
    }

    public function isDecorated()
    {
        // TODO: Implement isDecorated() method.
    }

    public function setFormatter(OutputFormatterInterface $formatter)
    {
        // TODO: Implement setFormatter() method.
    }

    public function getFormatter()
    {
        // TODO: Implement getFormatter() method.
    }
}
