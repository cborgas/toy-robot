<?php

namespace ToyRobot\Functional;

use ToyRobot\Unit\Mock;

class RunFromFileCommandLineTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function run_place_and_report_command_from_cli()
    {
        $commandFile = new Mock\CommandFile(['PLACE 0,0,NORTH', 'REPORT']);
        $output = shell_exec('./bin/toy-robot run-from-file ' . $commandFile->getFileName());

        $this->assertStringContainsString('0,0,NORTH', $output);
    }
}
