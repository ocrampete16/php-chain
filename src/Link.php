<?php

namespace MarcoPetersen\Chain;

abstract class Link
{
    /**
     * @param $payload
     *
     * @return mixed
     */
    protected function next($payload)
    {
        return $payload;
    }

    /**
     * @param $payload
     *
     * @return mixed
     */
    abstract public function execute($payload);
}
