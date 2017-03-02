<?php

use MarcoPetersen\Chain\Link;
use PHPUnit\Framework\TestCase;

/**
 * A simple link for testing purposes.
 */
class AddOne extends Link
{
    public function execute($number)
    {
        return $this->next($number + 1);
    }
}

class LinkTest extends TestCase
{
    /** @test */
    public function execute()
    {
        $this->assertEquals(2, (new AddOne())->execute(1));
    }

    /** @test */
    public function chain_to_another_link()
    {
        $this->assertEquals(3, (new AddOne())->then(new AddOne())->execute(1));
    }

    /** @test */
    public function chain_with_a_fqcn()
    {
        $this->assertEquals(3, (new AddOne())->then(AddOne::class)->execute(1));
    }
}
