# PHP Chain
[![Build Status](https://travis-ci.org/ocrampete16/php-chain.svg?branch=master)](https://travis-ci.org/ocrampete16/php-chain)
[![StyleCI](https://styleci.io/repos/83728346/shield?branch=master)](https://styleci.io/repos/83728346)
[![Maintainability](https://api.codeclimate.com/v1/badges/5b1aa7f182ab817af568/maintainability)](https://codeclimate.com/github/ocrampete16/php-chain/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/5b1aa7f182ab817af568/test_coverage)](https://codeclimate.com/github/ocrampete16/php-chain/test_coverage)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/ce912ef7-aa14-42e9-b6c7-e50c44311201/mini.png)](https://insight.sensiolabs.com/projects/ce912ef7-aa14-42e9-b6c7-e50c44311201)

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
