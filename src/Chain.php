<?php

namespace MarcoPetersen\Chain;

class Chain
{
    /**
     * @var Link
     */
    private $firstLink;

    public function __construct()
    {
        $this->firstLink = new DummyLink();
    }

    /**
     * @param Link|string $link
     *
     * @return $this
     */
    public function then($link)
    {
        $this->firstLink->then($link);

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
