<?php

namespace ToyRobot\Unit\Mock;

use ToyRobot\Direction;
use ToyRobot\Position;
use ToyRobot\Table;

class Receiver extends \ToyRobot\Command\Receiver
{
    public static function create(): Receiver
    {
        $receiver = new self();
        $receiver->directionContext = Direction\Context::create();
        $table = Table::create();
        $receiver->position = new Position($table);
        $receiver->position->setX(0)->setY(0);
        return $receiver;
    }
}
