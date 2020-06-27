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
        self::$defaultTable = Table::create();
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
        $xCoordinate = -3;
        $origin = (new Table\Origin())
            ->setX($xCoordinate + 1)
            ->setY($xCoordinate - 1);

        $table = new Table($origin);
        $position = new Position($table);
        $this->expectException(InvalidXCoordinateException::class);
        $position->setX($xCoordinate);
    }

    /**
     * @test
     */
    public function cannot_set_position_x_coordinate_outside_of_table_height()
    {
        $xCoordinate = 10;
        $table = (Table::create())
            ->setHeight($xCoordinate + 1)
            ->setWidth($xCoordinate - 1);

        $position = new Position($table);
        $this->expectException(InvalidXCoordinateException::class);
        $position->setX($xCoordinate);
    }

    /**
     * @test
     */
    public function cannot_set_position_y_coordinate_outside_of_table_origin()
    {
        $yCoordinate = -2;
        $origin = (new Table\Origin())
            ->setX($yCoordinate - 1)
            ->setY($yCoordinate + 1);

        $table = new Table($origin);
        $position = new Position($table);
        $this->expectException(InvalidYCoordinateException::class);
        $position->setY($yCoordinate);
    }

    /**
     * @test
     */
    public function cannot_set_position_y_coordinate_outside_of_table_height()
    {
        $yCoordinate = 10;
        $table = (Table::create())
            ->setHeight($yCoordinate - 1)
            ->setWidth($yCoordinate + 1);

        $position = new Position($table);
        $this->expectException(InvalidYCoordinateException::class);
        $position->setY($yCoordinate);
    }
}
