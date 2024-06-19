<?php

namespace CancioLabs\ValueObject\Cep\Tests;

use CancioLabs\ValueObject\Cep\Cep;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class CepTest extends TestCase
{

    public function testToString(): void
    {
        $cep = new Cep('78978-789');

        $this->assertSame('78978789', (string) $cep);
    }

    public function testGetRaw(): void
    {
        $cep = new Cep('12345-678');

        $this->assertSame('12345678', $cep->getRaw());
    }

    public function testGetFormatted(): void
    {
        $cep = new Cep('45645-456');

        $this->assertSame('45645-456', $cep->getFormatted());
    }

    public function testCepWithEmptyString(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The CEP must not be an empty string.');

        new Cep('');
    }

    /**
     * @dataProvider invalidPatternDataProvider
     */
    public function testCepWithInvalidPattern(string $string): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The CEP must match either "99999-999" or "99999999" pattern.');

        new Cep($string);
    }

    public static function invalidPatternDataProvider(): array
    {
        $testCases = [];

        $testCases[] = ['12345'];
        $testCases[] = ['1234567'];
        $testCases[] = ['123456789'];

        return $testCases;
    }

}