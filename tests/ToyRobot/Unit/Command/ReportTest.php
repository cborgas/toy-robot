<?php

namespace ToyRobot\Unit\Command;

use ToyRobot\Command;
use ToyRobot\Direction\East;

class ReportTest extends \ToyRobot\Unit\Command\Command
{
    /**
     * @test
     */
    public function report_command_is_instantiable()
    {
        $left = new Command\Report(self::$output, self::$receiver);
        $this->assertInstanceOf(Command\Report::class, $left);
    }

    /**
     * @doesNotPerformAssertions
     * @test
     */
    public function can_receive_report_of_default_direction_and_position()
    {
        $report = new Command\Report(self::$output, self::$receiver);

        self::$output
            ->shouldReceive('writeln')
            ->with('0,0,NORTH');

        $report->execute();
    }

    /**
     * @doesNotPerformAssertions
     * @test
     */
    public function can_receive_report_of_default_set_direction_and_position()
    {
        self::$receiver->position->setX(5);
        self::$receiver->position->setY(2);
        self::$receiver->directionContext->setDirection(new East());

        $report = new Command\Report(self::$output, self::$receiver);

        self::$output
            ->shouldReceive('writeln')
            ->with('5,2,EAST');

        $report->execute();
    }
}
