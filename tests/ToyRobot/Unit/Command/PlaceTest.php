<?php

namespace ToyRobot\Unit\Command;

use ToyRobot\Command;
use ToyRobot\Exception\Position\InvalidXCoordinateException;
use ToyRobot\Exception\Position\InvalidYCoordinateException;
use ToyRobot\Unit\Mock\Receiver;

class PlaceTest extends \ToyRobot\Unit\Command\Command
{
    /**
     * @test
     */
    public function place_command_is_instantiable()
    {
        $place = new Command\Place(self::$output, self::$receiver, 0, 0, 'NORTH');
        $this->assertInstanceOf(Command\Place::class, $place);
    }

    /**
     * @test
     */
    public function place_command_sets_x_coordinate()
    {
        $receiver = Receiver::create();
        $place = new Command\Place(self::$output, $receiver, 2, 3, 'SOUTH');
        $place->execute();
        $this->assertEquals(2, $receiver->position->getX());
    }

    /**
     * @test
     */
    public function place_command_sets_y_coordinate()
    {
        $receiver = Receiver::create();
        $place = new Command\Place(self::$output, $receiver, 2, 3, 'EAST');
        $place->execute();
        $this->assertEquals(3, $receiver->position->getY());
    }

    /**
     * @test
     */
    public function place_command_sets_north_direction()
    {
        $receiver = Receiver::create();
        $place = new Command\Place(self::$output, $receiver, 1, 5, 'NORTH');
        $place->execute();
        $this->assertEquals('north', $receiver->directionContext->toString());
    }

    /**
     * @test
     */
    public function place_command_sets_south_direction()
    {
        $receiver = Receiver::create();
        $place = new Command\Place(self::$output, $receiver, 1, 5, 'SOUTH');
        $place->execute();
        $this->assertEquals('south', $receiver->directionContext->toString());
    }

    /**
     * @test
     */
    public function place_command_sets_east_direction()
    {
        $receiver = Receiver::create();
        $place = new Command\Place(self::$output, $receiver, 4, 2, 'EAST');
        $place->execute();
        $this->assertEquals('east', $receiver->directionContext->toString());
    }

    /**
     * @test
     */
    public function place_command_sets_west_direction()
    {
        $receiver = Receiver::create();
        $place = new Command\Place(self::$output, $receiver, 0, 0, 'WEST');
        $place->execute();
        $this->assertEquals('west', $receiver->directionContext->toString());
    }

    /**
     * @test
     */
    public function place_command_cannot_set_negative_invalid_x_coordinate()
    {
        $receiver = Receiver::create();
        $place = new Command\Place(self::$output, $receiver, -1, 0, 'WEST');
        $this->expectException(InvalidXCoordinateException::class);
        $place->execute();
    }

    /**
     * @test
     */
    public function place_command_cannot_set_invalid_x_coordinate_over_width()
    {
        $receiver = Receiver::create();
        $place = new Command\Place(self::$output, $receiver, 6, 0, 'WEST');
        $this->expectException(InvalidXCoordinateException::class);
        $place->execute();
    }

    /**
     * @test
     */
    public function place_command_cannot_set_negative_invalid_y_coordinate()
    {
        $receiver = Receiver::create();
        $place = new Command\Place(self::$output, $receiver, 0, -1, 'WEST');
        $this->expectException(InvalidYCoordinateException::class);
        $place->execute();
    }

    /**
     * @test
     */
    public function place_command_cannot_set_invalid_y_coordinate_over_height()
    {
        $receiver = Receiver::create();
        $place = new Command\Place(self::$output, $receiver, 0, 6, 'WEST');
        $this->expectException(InvalidYCoordinateException::class);
        $place->execute();
    }

    /**
     * @test
     */
    public function place_command_cannot_set_invalid_direction()
    {
        $receiver = Receiver::create();
        $place = new Command\Place(self::$output, $receiver, 0, 0, 'HELLO');
        $this->expectException(\InvalidArgumentException::class);
        $place->execute();
    }
}
