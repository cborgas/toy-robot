<?php

namespace ToyRobot\Unit\App;

use Symfony\Component\Console\Input\ArrayInput;
use ToyRobot\App\Run;
use ToyRobot\Unit\Mock;

class RunCommandTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function run_place_and_report_command()
    {
        $commandFile = new Mock\CommandFile(['PLACE 0,0,NORTH', 'REPORT']);
        $output = new Mock\Output();
        $runGame = new Run();
        $arrayInput = new ArrayInput(['file' => $commandFile->getFileName()], $runGame->getDefinition());
        $runGame->execute($arrayInput, $output);
        $this->assertEquals('0,0,NORTH', $output->getWritelnMessage());
    }
}
