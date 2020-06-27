<?php

namespace ToyRobot\Unit\Command;

use ToyRobot\Command;

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
}
