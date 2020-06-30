<?php

namespace ToyRobot\Unit\Command;

use Symfony\Component\Console\Output\ConsoleOutput;
use ToyRobot\Command\Factory\DefaultFactory;

class DefaultFactoryTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function can_instantiate_default_factory()
    {
        $output = new ConsoleOutput();
        $commandFactory = new DefaultFactory($output);
        $this->assertInstanceOf(DefaultFactory::class, $commandFactory);
    }

    // @todo add more tests
}
