<?php

namespace ToyRobot;

use ToyRobot\Table\Origin;
use ToyRobot\Exception\Table\InvalidHeightException;
use ToyRobot\Exception\Table\InvalidWidthException;

class Table
{
    public const DEFAULT_HEIGHT = 5;

    public const DEFAULT_WIDTH = 5;

    public int $height = self::DEFAULT_HEIGHT;

    public int $width = self::DEFAULT_WIDTH;

    private Origin $origin;

    /**
     * Create a table with an origin
     *
     * @return Table
     */
    public static function create(): Table
    {
        $origin = new Origin();
        return new self($origin);
    }

    public function __construct(Origin $origin)
    {
        $this->origin = $origin;
    }

    public function getOrigin(): Origin
    {
        return $this->origin;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     * @return Table
     * @throws InvalidHeightException
     */
    public function setHeight(int $height): Table
    {
        if ($height < 0) {
            throw new InvalidHeightException();
        }

        $this->height = $height;
        return $this;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     * @return Table
     * @throws InvalidWidthException
     */
    public function setWidth(int $width): Table
    {
        if ($width < 0) {
            throw new InvalidWidthException();
        }

        $this->width = $width;
        return $this;
    }
}
