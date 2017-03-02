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
}
