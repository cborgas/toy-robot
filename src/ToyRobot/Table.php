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

    public static function create(): Table
    {
        $origin = new Origin();
        return new self($origin);
    }

    /**
     * @param Origin $origin
     */
    public function __construct(Origin $origin)
    {
        $this->origin = $origin;
    }

    /**
     * @return Origin
     */
    public function getOrigin(): Origin
    {
        return $this->origin;
    }

    /**
     * @return int
     */
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

    /**
     * @return int
     */
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
