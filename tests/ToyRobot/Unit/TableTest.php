<?php

namespace ToyRobot\Unit;

use ToyRobot\Table;
use ToyRobot\Exception\Table\InvalidHeightException;
use ToyRobot\Exception\Table\InvalidWidthException;

class TableTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function table_is_instantiable(): void
    {
        $origin = new Table\Origin();
        $table = new Table($origin);
        $this->assertInstanceOf(Table::class, $table);
    }

    /**
     * @test
     */
    public function table_is_statically_instantiable(): void
    {
        $table = Table::create();
        $this->assertInstanceOf(Table::class, $table);
    }

    /**
     * @test
     */
    public function can_get_and_set_table_height(): void
    {
        $table = Table::create();
        $table->setHeight(10);
        $this->assertEquals(10, $table->getHeight());
    }
    /**
     * @test
     */
    public function can_get_and_set_table_width(): void
    {
        $table = Table::create();
        $table->setWidth(20);
        $this->assertEquals(20, $table->getWidth());
    }

    /**
     * @test
     */
    public function cannot_set_table_height_to_negative_integer(): void
    {
        $table = Table::create();
        $this->expectException(InvalidHeightException::class);
        $table->setHeight(-3);
    }

    /**
     * @test
     */
    public function cannot_set_table_width_to_negative_integer(): void
    {
        $table = Table::create();
        $this->expectException(InvalidWidthException::class);
        $table->setWidth(-4);
    }
}
