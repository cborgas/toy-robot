<?php

namespace ToyRobot;

use ToyRobot\Exception\Position\InvalidXCoordinateException;
use ToyRobot\Exception\Position\InvalidYCoordinateException;

class Position implements Coordinate
{
    private Table $table;

    private int $xCoordinate;

    private int $yCoordinate;

    public function __construct(Table $table)
    {
        $this->table = $table;
    }

    public function getX(): int
    {
        return $this->xCoordinate;
    }

    public function setX(int $x): Position
    {
        $this->validateXCoordinate($x);

        $this->xCoordinate = $x;

        return $this;
    }

    /**
     * @param int $x
     * @return void
     * @throws InvalidXCoordinateException
     */
    private function validateXCoordinate(int $x): void
    {
        // The position cannot be outside the origin
        if ($x < $this->table->getOrigin()->getX()) {
            throw new InvalidXCoordinateException();
        }

        // The position cannot be outside of the height of the table
        if ($x > $this->table->getHeight()) {
            throw new InvalidXCoordinateException();
        }
    }

    public function getY(): int
    {
        return $this->yCoordinate;
    }

    public function setY(int $y): Position
    {
        $this->validateYCoordinate($y);

        $this->yCoordinate = $y;

        return $this;
    }

    /**
     * @param int $y
     * @return void
     * @throws InvalidYCoordinateException
     */
    private function validateYCoordinate(int $y): void
    {
        // The position cannot be outside the origin
        if ($y < $this->table->getOrigin()->getY()) {
            throw new InvalidYCoordinateException();
        }
    }
}
