<?php

namespace ToyRobot;

use ToyRobot\Exception\Position\InvalidXCoordinateException;
use ToyRobot\Exception\Position\InvalidYCoordinateException;
use ToyRobot\Exception\Position\XCoordinateNotSetException;
use ToyRobot\Exception\Position\YCoordinateNotSetException;

class Position implements Coordinate
{
    private Table $table;

    private ?int $x = null;

    private ?int $y = null;

    public function __construct(Table $table)
    {
        $this->table = $table;
    }

    public function getX(): int
    {
        if (!is_int($this->x)) {
            throw new XCoordinateNotSetException();
        }

        return $this->x;
    }

    public function setX(int $x): Position
    {
        $this->validateXCoordinate($x);

        $this->x = $x;

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

        // The position cannot be outside of the width of the table
        if ($x > $this->table->getWidth()) {
            throw new InvalidXCoordinateException();
        }
    }

    public function getY(): int
    {
        if (!is_int($this->y)) {
            throw new YCoordinateNotSetException();
        }

        return $this->y;
    }

    public function setY(int $y): Position
    {
        $this->validateYCoordinate($y);

        $this->y = $y;

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

        // The position cannot be outside of the height of the table
        if ($y > $this->table->getHeight()) {
            throw new InvalidYCoordinateException();
        }
    }
}
