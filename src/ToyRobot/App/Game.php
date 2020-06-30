<?php

namespace ToyRobot\App;

use ToyRobot\App\Command\NoMoreCommandsException;
use ToyRobot\Table;
use ToyRobot\ToyRobot;
use ToyRobot\Command;
use ToyRobot\App\Command\Reader as CommandReader;

class Game extends Command\Invoker
{
    private Table $table;

    private CommandReader $commandReader;

    public function __construct(
        Table $table,
        ToyRobot $toyRobot,
        Command\Factory $factory,
        CommandReader $commandReader
    ) {
        $this->table = $table;
        $this->receiver = $toyRobot;
        $this->commandFactory = $factory;
        $this->commandReader = $commandReader;
    }

    public function getToyRobot(): ToyRobot
    {
        return $this->receiver;
    }

    /**
     * Run the game commands
     */
    public function run(): void
    {
        // Loop through commands until a no more commands exception is thrown
        try {
            while (true) {
                $appCommand = $this->commandReader->getNextCommand();

                $this->execute(
                    $appCommand->getCommand(),
                    ...$appCommand->getArguments()
                );
            }
        } catch (NoMoreCommandsException $exception) {
            // Finished executing commands
        }
    }
}
