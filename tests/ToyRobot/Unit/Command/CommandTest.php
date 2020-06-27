<?php

namespace ToyRobot\Unit\Command;

use Symfony\Component\Console\Output\OutputInterface;
use ToyRobot\Command\Receiver;
use ToyRobot\Unit\Mock;

class CommandTest extends \PHPUnit\Framework\TestCase
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

    /**
     * @test
     */
    public function test_mock_dependencies()
    {
        $this->assertInstanceOf(Receiver::class, self::$receiver);
        $this->assertInstanceOf(OutputInterface::class, self::$output);
    }
}
