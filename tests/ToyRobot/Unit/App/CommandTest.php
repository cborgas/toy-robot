<?php

namespace ToyRobot\Unit\App;

use ToyRobot\App;

class CommandTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function command_is_instantiable()
    {
        $command = new App\Command('');
        $this->assertInstanceOf(App\Command::class, $command);
    }

    /**
     * @test
     */
    public function command_has_one_word_command_string()
    {
        $command = new App\Command('hello');
        $this->assertEquals('hello', $command->getCommand());
    }

    /**
     * @test
     */
    public function command_has_one_word_command_string_with_arguments()
    {
        $command = new App\Command('hello 11,78,why');
        $this->assertEquals('hello', $command->getCommand());
        $this->assertEquals('11', $command->getArguments()[0]);
        $this->assertEquals('78', $command->getArguments()[1]);
        $this->assertEquals('why', $command->getArguments()[2]);
    }
}
