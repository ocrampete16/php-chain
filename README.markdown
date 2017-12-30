# PHP Chain
[![Build Status](https://travis-ci.org/ocrampete16/php-chain.svg?branch=master)](https://travis-ci.org/ocrampete16/php-chain)
[![StyleCI](https://styleci.io/repos/83728346/shield?branch=master)](https://styleci.io/repos/83728346)

An implementation of the _chain-of-responsibility pattern_ in PHP.

## Installation
```
composer require marcopetersen/php-chain
```

## Usage
```php
<?php

use MarcoPetersen\Chain\Chain;
use MarcoPetersen\Chain\Link;

// First we define the links that will be part of our chain...
class AddOne extends Link
{
    public function execute($number)
    {
        return $this->next($number + 1);
    }
}

class EndChain extends Link
{
    public function execute($payload)
    {
        return $payload;
    }
}

// ...after which we chain them up together.
$chain = (new Chain())
    ->then(new AddOne()) // you can pass in instances...
    ->then(AddOne::class) // ...or just the FQCN, if you prefer.
    ->then(EndChain::class) // To end the chain, just don't call `next`.
    ->then(AddOne::class) // This won't get called.

$chain->execute(1); // 3
```
