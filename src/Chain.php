<?php

namespace MarcoPetersen\Chain;

class Chain
{
    /**
     * @var Link
     */
    private $firstLink;

    /**
     * @var Link
     */
    private $lastLink;

    public function __construct()
    {
        $this->lastLink = $this->firstLink = new DummyLink();
    }

    /**
     * @param Link|string $link
     *
     * @return $this
     */
    public function then($link)
    {
        $this->lastLink->then($link);
        $this->lastLink = $this->lastLink->getSuccessor();

        return $this;
    }

    /**
     * @param $payload
     *
     * @return mixed
     */
    public function execute($payload)
    {
        return $this->firstLink->execute($payload);
    }
}
