<?php

namespace CancioLabs\ValueObject\Cep;

use InvalidArgumentException;

class Cep
{

    public const PATTERN = '/^\d{5}-?\d{3}$/';

    private string $cep;

    public function __construct(string $cep)
    {
        if (trim($cep) === '') {
            throw new InvalidArgumentException('The CEP must not be an empty string.');
        }

        if (!preg_match(self::PATTERN, $cep)) {
            throw new InvalidArgumentException('The CEP must match either "99999-999" or "99999999" pattern.');
        }

        $this->cep = (string) preg_replace('/\D/', '', $cep);
    }

    public function __toString(): string
    {
        return $this->getRaw();
    }

    public function getRaw(): string
    {
        return $this->cep;
    }

    public function getFormatted(): string
    {
        return sprintf(
            '%s-%s',
            substr($this->cep, 0, 5),
            substr($this->cep, -3)
        );
    }

}