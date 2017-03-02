<?php

use MarcoPetersen\Chain\Link;

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
