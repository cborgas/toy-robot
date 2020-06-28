<?php

namespace ToyRobot\Unit\Command;

use ToyRobot\Command\Factory\DefaultFactory;
use ToyRobot\App;

class DefaultFactoryTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function can_instantiate_default_factory()
    {
        $output = new App\Output\StdOut();
        $commandFactory = new DefaultFactory($output);
        $this->assertInstanceOf(DefaultFactory::class, $commandFactory);
    }

    // @todo add more tests
}
