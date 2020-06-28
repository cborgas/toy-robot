<?php

namespace ToyRobot\Unit\App;

use ToyRobot\Unit\Mock\CommandFile;
use ToyRobot\App\Command\Reader;

class TextFileTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function text_file_reader_is_instantiable()
    {
        $commandFile = new CommandFile(['hello']);
        $textFileReader = new Reader\TextFile($commandFile->getFileName());
        $this->assertInstanceOf(Reader\TextFile::class, $textFileReader);
    }

    /**
     * @test
     */
    public function text_file_reader_can_read_commands()
    {
        $commandFile = new CommandFile(['hello', 'there', 'foo bar,7']);
        $textFileReader = new Reader\TextFile($commandFile->getFileName());
        $this->assertEquals('hello', $textFileReader->getNextCommand()->getCommand());
        $this->assertEquals('there', $textFileReader->getNextCommand()->getCommand());
        $commandThree = $textFileReader->getNextCommand();
        $this->assertEquals('foo', $commandThree->getCommand());
        $this->assertEquals('bar', $commandThree->getArguments()[0]);
        $this->assertEquals('7', $commandThree->getArguments()[1]);
    }
}
