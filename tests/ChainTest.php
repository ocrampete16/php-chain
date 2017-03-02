<?php

require_once 'AddOne.php';

use MarcoPetersen\Chain\Chain;
use PHPUnit\Framework\TestCase;

class ChainTest extends TestCase
{
    /** @test */
    public function do_nothing_if_empty()
    {
        $this->assertEquals(1, (new Chain())->execute(1));
    }

    /** @test */
    public function chain_to_link()
    {
        $this->assertEquals(2, (new Chain())->then(new AddOne())->execute(1));
    }
}
