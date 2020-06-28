<?php

namespace ToyRobot\App;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use ToyRobot\App\Command\Reader\TextFile;
use ToyRobot\App\Output\StdOut;
use ToyRobot\Command\Factory\DefaultFactory;
use ToyRobot\Direction\Context;
use ToyRobot\Position;
use ToyRobot\Table;
use ToyRobot\ToyRobot;
use ToyRobot\Unit\Mock\Output;

/**
 * Symfony command to run the application from the command line
 */
class Run extends \Symfony\Component\Console\Command\Command
{
    protected static $defaultName = 'run-from-file';

    private const FILE_ARGUMENT = 'file';

    public function configure()
    {
        $this->setDescription(
            "Run the game with commands from a given file"
            )
            ->addArgument(
                self::FILE_ARGUMENT,
                InputArgument::REQUIRED,
                "Path of file"
            );
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $filePath = $input->getArgument(self::FILE_ARGUMENT);

        $table = Table::create();
        $toyRobot = new ToyRobot();
        $toyRobot->directionContext = Context::create();
        $toyRobot->position = new Position($table);
        $stdOut = new StdOut();
        $commandFactory = new DefaultFactory($stdOut);
        $reader = new TextFile($filePath);
        $game = new Game($table, $toyRobot, $commandFactory, $reader);
        $game->run();

        return self::SUCCESS;
    }
}
