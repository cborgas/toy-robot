<?php

namespace ToyRobot\Unit;

class TableTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function table_is_instantiable()
    {
        $table = new \ToyRobot\Table;

        $this->assertInstanceOf(\ToyRobot\Table::class, $table);
    }
}
