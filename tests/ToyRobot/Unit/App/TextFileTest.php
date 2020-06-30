<?php

namespace ToyRobot\Unit\App;

use ToyRobot\App\Command\NoMoreCommandsException;
use ToyRobot\Unit\Mock;
use ToyRobot\App\Command\Reader;

class TextFileTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function text_file_reader_is_instantiable()
    {
        $commandFile = new Mock\CommandFile(['hello']);
        $textFileReader = new Reader\TextFile($commandFile->getFileName());
        $this->assertInstanceOf(Reader\TextFile::class, $textFileReader);
    }

    /**
     * @test
     */
    public function text_file_reader_can_read_commands()
    {
        $commandFile = new Mock\CommandFile(['hello', 'there', 'foo bar,7']);
        $textFileReader = new Reader\TextFile($commandFile->getFileName());
        $this->assertEquals('hello', $textFileReader->getNextCommand()->getCommand());
        $this->assertEquals('there', $textFileReader->getNextCommand()->getCommand());
        $commandThree = $textFileReader->getNextCommand();
        $this->assertEquals('foo', $commandThree->getCommand());
        $this->assertEquals('bar', $commandThree->getArguments()[0]);
        $this->assertEquals('7', $commandThree->getArguments()[1]);
    }

    /**
     * @test
     */
    public function get_exception_file_when_cannot_open_file()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Reader\TextFile('./hopefully/not/a/real/file');
    }

    /**
     * @test
     */
    public function get_exception_for_no_more_commands()
    {
        $commandFile = new Mock\CommandFile(['hello']);
        $textFileReader = new Reader\TextFile($commandFile->getFileName());
        $textFileReader->getNextCommand();
        $this->expectException(NoMoreCommandsException::class);
        $textFileReader->getNextCommand()->getCommand();
    }
}
