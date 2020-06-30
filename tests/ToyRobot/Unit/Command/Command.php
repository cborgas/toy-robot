<?php

namespace ToyRobot\Unit\Command;

use ToyRobot\Unit\Mock;

class Command extends \PHPUnit\Framework\TestCase
{
    protected static Mock\Output $output;

    protected static Mock\Receiver $receiver;

    public static function setUpBeforeClass(): void
    {
        self::reset();
    }

    protected static function reset(): void
    {
        self::$receiver = Mock\Receiver::create();
        self::$output = \Mockery::mock(Mock\Output::class);
    }
}
