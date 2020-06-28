<?php

namespace ToyRobot\Unit\Mock;

use ToyRobot\Command\Factory\DefaultFactory;
use ToyRobot\Direction;
use ToyRobot\Position;
use ToyRobot\Table;
use ToyRobot\ToyRobot;
use ToyRobot\App;

class Game extends \ToyRobot\App\Game
{
    public function __construct(array $commands) {
        $table = Table::create();
        $toyRobot = new ToyRobot();
        $toyRobot->directionContext = new Direction\Context();
        $toyRobot->position = new Position($table);
        $output = new Output();
        $commandFactory = new DefaultFactory($output);
        $reader = new App\Command\Reader\ArrayReader($commands);

        parent::__construct($table, $toyRobot, $commandFactory, $reader);
    }
}
