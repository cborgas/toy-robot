<?php

namespace ToyRobot\Unit\Command;

use ToyRobot\Command;
use ToyRobot\Direction\Context;
use ToyRobot\Direction\East;
use ToyRobot\Direction\North;
use ToyRobot\Direction\South;
use ToyRobot\Direction\West;
use ToyRobot\Exception\Position\InvalidXCoordinateException;
use ToyRobot\Exception\Position\InvalidYCoordinateException;
use ToyRobot\Position;
use ToyRobot\Table;
use ToyRobot\Unit\Mock\Receiver;

class MoveTest extends \ToyRobot\Unit\Command\Command
{
    /**
     * @test
     */
    public function move_command_is_instantiable()
    {
        $move = new Command\Move(self::$output, self::$receiver);
        $this->assertInstanceOf(Command\Move::class, $move);
    }

    /**
     * @test
     */
    public function receiver_moves_north_from_default_direction_and_position()
    {
        $receiver = Receiver::create();
        $left = new Command\Move(self::$output, $receiver);
        $left->execute();
        $this->assertEquals(1, $receiver->position->getY());
        $this->assertEquals(0, $receiver->position->getX());
    }

    /**
     * @test
     */
    public function receiver_moves_from_north_facing_direction_and_default_position()
    {
        $receiver = Receiver::create();
        $receiver->directionContext->setDirection(new North());
        $move = new Command\Move(self::$output, $receiver);
        $move->execute();
        $this->assertEquals(1, $receiver->position->getY());
        $this->assertEquals(0, $receiver->position->getX());
    }

    /**
     * @test
     */
    public function receiver_moves_from_south_facing_direction_and_top_position()
    {
        $receiver = Receiver::create();
        $receiver->directionContext->setDirection(new South());
        $receiver->position->setY(5);
        $move = new Command\Move(self::$output, $receiver);
        $move->execute();
        $this->assertEquals(4, $receiver->position->getY());
        $this->assertEquals(0, $receiver->position->getX());
    }

    /**
     * @test
     */
    public function receiver_moves_from_east_facing_direction_and_right_position()
    {
        $receiver = Receiver::create();
        $receiver->directionContext->setDirection(new East());
        $receiver->position->setX(4);
        $move = new Command\Move(self::$output, $receiver);
        $move->execute();
        $this->assertEquals(0, $receiver->position->getY());
        $this->assertEquals(5, $receiver->position->getX());
    }

    /**
     * @test
     */
    public function receiver_moves_from_west_facing_direction_and_left_position()
    {
        $receiver = Receiver::create();
        $receiver->directionContext->setDirection(new West());
        $receiver->position->setX(2);
        $move = new Command\Move(self::$output, $receiver);
        $move->execute();
        $this->assertEquals(0, $receiver->position->getY());
        $this->assertEquals(1, $receiver->position->getX());
    }

    /**
     * @test
     */
    public function receiver_cannot_move_south_from_default_direction_and_position()
    {
        $receiver = Receiver::create();
        $move = new Command\Move(self::$output, $receiver);
        $move->execute();
        $this->assertEquals(1, $receiver->position->getY());
        $this->assertEquals(0, $receiver->position->getX());
    }

    /**
     * @test
     */
    public function receiver_cannot_move_south_from_bottom()
    {
        $receiver = Receiver::create();
        $table = Table::create();
        $receiver->position = new Position($table);
        $receiver->position->setX(0)->setY(0);
        $receiver->directionContext->setDirection(new South());
        $move = new Command\Move(self::$output, $receiver);
        $this->expectException(InvalidYCoordinateException::class);
        $move->execute();
    }

    /**
     * @test
     */
    public function receiver_cannot_move_west_from_left_side()
    {
        $receiver = Receiver::create();
        $table = Table::create();
        $receiver->position = new Position($table);
        $receiver->position->setX(0)->setY(0);
        $receiver->directionContext->setDirection(new West());
        $move = new Command\Move(self::$output, $receiver);
        $this->expectException(InvalidXCoordinateException::class);
        $move->execute();
    }

    /**
     * @test
     */
    public function receiver_cannot_move_north_from_top()
    {
        $receiver = Receiver::create();
        $table = Table::create();
        $receiver->position = new Position($table);
        $receiver->position->setX(0)->setY(5);
        $receiver->directionContext->setDirection(new North());
        $move = new Command\Move(self::$output, $receiver);
        $this->expectException(InvalidYCoordinateException::class);
        $move->execute();
    }

    /**
     * @test
     */
    public function receiver_cannot_move_east_from_right_side()
    {
        $receiver = Receiver::create();
        $table = Table::create();
        $receiver->position = new Position($table);
        $receiver->position->setX(5)->setY(0);
        $receiver->directionContext->setDirection(new East());
        $move = new Command\Move(self::$output, $receiver);
        $this->expectException(InvalidXCoordinateException::class);
        $move->execute();
    }
}
