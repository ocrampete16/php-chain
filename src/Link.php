<?php

namespace MarcoPetersen\Chain;

abstract class Link
{
    /**
     * @var Link
     */
    private $successor;

    /**
     * @param Link $successor
     *
     * @return $this
     */
    public function then(Link $successor)
    {
        $this->successor = $successor;

        return $this;
    }

    /**
     * @param $payload
     *
     * @return mixed
     */
    protected function next($payload)
    {
        if (!$this->successor) {
            return $payload;
        }

        return $this->successor->execute($payload);
    }

    /**
     * @param $payload
     *
     * @return mixed
     */
    abstract public function execute($payload);
}
