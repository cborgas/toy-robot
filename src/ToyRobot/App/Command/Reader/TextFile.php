<?php

namespace ToyRobot\App\Command\Reader;

use ToyRobot\App;

/**
 * Get commands from a text file where each line of the file is a command string
 */
class TextFile implements App\Command\Reader
{
    /**
     * @var resource
     */
    private $file;

    /**
     * @param string $file
     * @throws \InvalidArgumentException
     */
    public function __construct(string $file)
    {
        $resource = @fopen($file, "r");

        if (!$resource) {
            throw new \InvalidArgumentException("File not found");
        }

        $this->file = $resource;
    }

    public function getNextCommand(): App\Command
    {
        if (feof($this->file)) {
            fclose($this->file);
            throw new App\Command\NoMoreCommandsException();
        }

        return new App\Command(fgets($this->file));
    }
}
