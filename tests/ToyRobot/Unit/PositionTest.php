<?php

namespace ToyRobot\Unit;

use ToyRobot\Position;
use ToyRobot\Table;
use ToyRobot\Exception\Position\InvalidXCoordinateException;
use ToyRobot\Exception\Position\InvalidYCoordinateException;

class PositionTest extends \PHPUnit\Framework\TestCase
{
    protected static Table $defaultTable;

    public static function setUpBeforeClass(): void
    {
        // Setup a default table with default origin, height and width
        self::$defaultTable = new Table();
    }

    /**
     * @test
     */
    public function position_is_instantiable(): void
    {
        $position = new Position(self::$defaultTable);
        $this->assertInstanceOf(Position::class, $position);
    }

    /**
     * @test
     */
    public function can_get_and_set_position_x_coordinate()
    {
        $position = new Position(self::$defaultTable);
        $position->setX(3);
        $this->assertEquals(3, $position->getX());
    }

    /**
     * @test
     */
    public function can_get_and_set_position_y_coordinate()
    {
        $position = new Position(self::$defaultTable);
        $position->setY(2);
        $this->assertEquals(2, $position->getY());
    }

    /**
     * @test
     */
    public function cannot_set_position_x_coordinate_outside_of_table_origin()
    {
        $position = new Position(self::$defaultTable);
        $this->expectException(InvalidXCoordinateException::class);
        $position->setX(-6);
    }

    /**
     * @test
     */
    public function cannot_set_position_x_coordinate_outside_of_table_height()
    {
        $position = new Position(self::$defaultTable);
        $this->expectException(InvalidXCoordinateException::class);
        $position->setX(7);
    }

    /**
     * @test
     */
    public function cannot_set_position_y_coordinate_outside_of_table_origin()
    {
        $position = new Position(self::$defaultTable);
        $this->expectException(InvalidYCoordinateException::class);
        $position->setY(-6);
    }

    /**
     * @test
     */
    public function cannot_set_position_y_coordinate_outside_of_table_height()
    {
        $position = new Position(self::$defaultTable);
        $this->expectException(InvalidYCoordinateException::class);
        $position->setY(7);
    }
}
