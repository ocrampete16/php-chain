<?php

namespace MarcoPetersen\Chain;

/**
 * A link that simply defers to its successor.
 */
class DummyLink extends Link
{
    /**
     * @param $payload
     *
     * @return mixed
     */
    public function execute($payload)
    {
        return $this->next($payload);
    }
}
