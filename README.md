# CEP Value Object

This tiny package contains a class that represents a CEP (Brazilian Zipcode).

## Requirements

PHP 7.4 or greater is required, nothing else.

## Installation

    composer require cancio-labs/cep-value-object

## How to use it

```
use CancioLabs\ValueObject\Cep\Cep;

$cep = new Cep('20710-305'); // or '20710305'
echo $cep; // outputs 22710305
echo $cep->getRaw(); // outputs 22710305
echo $cep->getFormatted(); // outputs 22710-305
```

The CEP class will validate the given string and throw an exception if it's not a valid CEP (ie if doesn't match either the 99999-999 or 99999999 pattern).