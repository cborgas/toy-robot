<?php

namespace ToyRobot\Unit\App;

use ToyRobot\App\Command\Reader\ArrayReader;

class ArrayReaderTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function array_reader_is_instantiable()
    {
        $arrayReader = new ArrayReader([]);
        $this->assertInstanceOf(ArrayReader::class, $arrayReader);
    }

    /**
     * @test
     */
    public function array_reader_can_interpret_first_command()
    {
        $arrayReader = new ArrayReader([
            'hello'
        ]);
        $this->assertEquals('hello', $arrayReader->getNextCommand()->getCommand());
    }

    /**
     * @test
     */
    public function array_reader_can_interpret_multiple_commands()
    {
        $arrayReader = new ArrayReader([
            'hello',
            'someCommand special,0'
        ]);
        // Get the first command
        $arrayReader->getNextCommand();
        $secondCommand = $arrayReader->getNextCommand();
        $this->assertEquals('someCommand', $secondCommand->getCommand());
        $this->assertEquals('special', $secondCommand->getArguments()[0]);
        $this->assertEquals('0', $secondCommand->getArguments()[1]);
    }
}
