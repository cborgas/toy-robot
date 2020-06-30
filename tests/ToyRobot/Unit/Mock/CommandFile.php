<?php

namespace ToyRobot\Unit\Mock;

/**
 * Create a new file with a list of given commands
 */
class CommandFile
{
    /**
     * @var false|string
     */
    private $temporaryFileName;

    public function __construct(array $commands)
    {
        // Create a new temporary file
        $this->temporaryFileName = tempnam("/tmp", "toy-robot-commands");

        $handle = fopen($this->temporaryFileName, "w");
        $countCommands = count($commands);

        foreach ($commands as $key => $command) {
            // Only append PHP_EOL on all but last command
            $command = $countCommands == $key + 1 ? $command : $command . PHP_EOL;

            // Write each command on a new line to the temporary file
            fwrite($handle, $command);
        }

        fclose($handle);
    }

    public function getFileName(): string
    {
        return $this->temporaryFileName;
    }

    public function __destruct()
    {
        unlink($this->temporaryFileName);
    }
}
