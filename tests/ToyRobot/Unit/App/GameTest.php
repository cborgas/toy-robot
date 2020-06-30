<?php

namespace ToyRobot\Unit\App;

use ToyRobot\App;
use ToyRobot\Command\Factory\DefaultFactory;
use ToyRobot\Direction;
use ToyRobot\Exception\Context\DirectionNotSetException;
use ToyRobot\Exception\Position\XCoordinateNotSetException;
use ToyRobot\Exception\Position\YCoordinateNotSetException;
use ToyRobot\Position;
use ToyRobot\Table;
use ToyRobot\ToyRobot;
use ToyRobot\Unit\Mock;

class GameTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function can_instantiate_game()
    {
        $table = Table::create();
        $toyRobot = new ToyRobot();
        $toyRobot->directionContext = new Direction\Context();
        $toyRobot->position = new Position($table);
        $output = new App\Output\StdOut();
        $commandFactory = new DefaultFactory($output);
        $reader = new App\Command\Reader\ArrayReader([]);
        $game = new App\Game($table, $toyRobot, $commandFactory, $reader);
        $this->assertInstanceOf(App\Game::class, $game);
    }

    /**
     * @test
     */
    public function game_runs_without_exception()
    {
        $table = Table::create();
        $toyRobot = new ToyRobot();
        $toyRobot->directionContext = new Direction\Context();
        $toyRobot->position = new Position($table);
        $output = new App\Output\StdOut();
        $commandFactory = new DefaultFactory($output);
        $reader = new App\Command\Reader\ArrayReader(['PLACE 0,0,NORTH, MOVE']);
        $game = new App\Game($table, $toyRobot, $commandFactory, $reader);
        $game->run();
        $this->assertInstanceOf(App\Game::class, $game);
    }

    /**
     * @test
     */
    public function can_statically_build_game()
    {
        $game = new Mock\Game([]);
        $this->assertInstanceOf(App\Game::class, $game);
    }

    /**
     * @test
     */
    public function can_get_toy_robot_from_game()
    {
        $game = new Mock\Game([]);
        $toyRobot = $game->getToyRobot();
        $this->assertInstanceOf(ToyRobot::class, $toyRobot);
    }

    /**
     * @test
     */
    public function can_execute_commands_on_game()
    {
        $game = new Mock\Game(['place 0,0,north', 'right']);
        $game->run();
        $direction = $game->getToyRobot()->directionContext->toString();
        $this->assertEquals('east', $direction);
    }

    /**
     * @test
     */
    public function can_execute_command_with_arguments_on_game()
    {
        $game = new Mock\Game(['place 1,2,south']);
        $game->run();
        $direction = $game->getToyRobot()->directionContext->toString();
        $position = $game->getToyRobot()->position;
        $this->assertEquals('south', $direction);
        $this->assertEquals(1, $position->getX());
        $this->assertEquals(2, $position->getY());
    }

    /**
     * @test
     */
    public function can_execute_multiple_commands_on_game()
    {
        $game = new Mock\Game([
            'PLACE 0,0,NORTH',
            'MOVE'
        ]);
        $game->run();
        $direction = $game->getToyRobot()->directionContext->toString();
        $position = $game->getToyRobot()->position;
        $this->assertEquals('north', $direction);
        $this->assertEquals(0, $position->getX());
        $this->assertEquals(1, $position->getY());
    }

    /**
     * @test
     */
    public function can_execute_multiple_commands_on_game_and_ignore_failing_commands()
    {
        $game = new Mock\Game([
            'PLACE 0,0,SOUTH',
            'MOVE',
            'RIGHT',
            'RIGHT',
            'MOVE',
            'MOVE'
        ]);
        $game->run();
        $direction = $game->getToyRobot()->directionContext->toString();
        $position = $game->getToyRobot()->position;
        $this->assertEquals('north', $direction);
        $this->assertEquals(0, $position->getX());
        $this->assertEquals(2, $position->getY());
    }

    /**
     * @test
     */
    public function can_execute_multiple_commands_on_game_and_ignore_invalid_commands()
    {
        $game = new Mock\Game([
            'PLACE 0,0,EAST',
            'MOVE',
            'Hello There',
            'MOVE',
            'MOVE'
        ]);
        $game->run();
        $direction = $game->getToyRobot()->directionContext->toString();
        $position = $game->getToyRobot()->position;
        $this->assertEquals('east', $direction);
        $this->assertEquals(3, $position->getX());
        $this->assertEquals(0, $position->getY());
    }

    /**
     * @test
     */
    public function cannot_execute_commands_and_get_position_without_placement()
    {
        $game = new Mock\Game([
            'MOVE',
            'Hello There',
            'MOVE',
            'MOVE'
        ]);
        $game->run();
        $this->expectException(YCoordinateNotSetException::class);
        $game->getToyRobot()->position->getY();
        $this->expectException(XCoordinateNotSetException::class);
        $game->getToyRobot()->position->getX();
    }

    /**
     * @test
     */
    public function cannot_execute_commands_and_get_direction_without_placement()
    {
        $game = new Mock\Game([
            'MOVE',
            'MOVE',
            'MOVE',
            'LEFT'
        ]);
        $game->run();
        $this->expectException(DirectionNotSetException::class);
        $game->getToyRobot()->directionContext->toString();
    }

    /**
     * @test
     */
    public function can_execute_multiple_commands_on_game_and_ignore_commands_before_place()
    {
        $game = new Mock\Game([
            'MOVE',
            'LEFT',
            'RIGHT',
            'REPORT',
            'PLACE 0,0,EAST',
            'MOVE',
            'MOVE',
            'MOVE',
            'RIGHT'
        ]);

        $game->run();
        $direction = $game->getToyRobot()->directionContext->toString();
        $position = $game->getToyRobot()->position;
        $this->assertEquals('south', $direction);
        $this->assertEquals(3, $position->getX());
        $this->assertEquals(0, $position->getY());
    }
}
