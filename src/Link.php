<?php

namespace MarcoPetersen\Chain;

abstract class Link
{
    /**
     * @var Link|null
     */
    private $successor;

    /**
     * @param Link|string $successor
     *
     * @return $this
     */
    public function then($successor)
    {
        if (is_string($successor)) {
            $successor = new $successor();
        }

        $this->successor = $successor;

        return $this;
    }

    /**
     * @return Link|null
     */
    public function getSuccessor()
    {
        return $this->successor;
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
