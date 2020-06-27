<?php

namespace ToyRobot\Command;

use ToyRobot\Direction;
use ToyRobot\Position;

abstract class Receiver
{
    public Position $position;

    public Direction\Context $directionContext;
}
