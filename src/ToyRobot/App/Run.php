<?php

namespace ToyRobot\App;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use ToyRobot\App\Command\Reader\TextFile;
use ToyRobot\Command\Factory\DefaultFactory;
use ToyRobot\Direction\Context;
use ToyRobot\Position;
use ToyRobot\Table;
use ToyRobot\ToyRobot;

/**
 * Symfony command to run the application from the command line
 */
class Run extends \Symfony\Component\Console\Command\Command
{
    protected static $defaultName = 'run-from-file';

    private const FILE_ARGUMENT = 'file';

    /**
     * Configure the run command
     *
     * @return void
     */
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

    /**
     * Build and run the game
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $filePath = $input->getArgument(self::FILE_ARGUMENT);
        /*
         * @todo move building of the game to a service locator or at the very
         * least a builder class
         */
        $table = Table::create();
        $toyRobot = new ToyRobot();
        $toyRobot->directionContext = new Context();
        $toyRobot->position = new Position($table);
        $commandFactory = new DefaultFactory($output);
        $reader = new TextFile($filePath);
        $game = new Game($table, $toyRobot, $commandFactory, $reader);
        $game->run();

        return self::SUCCESS;
    }
}
