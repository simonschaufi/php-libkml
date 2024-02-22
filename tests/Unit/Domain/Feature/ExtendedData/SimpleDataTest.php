<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\Feature\ExtendedData;

use LibKml\Domain\Feature\ExtendedData\SimpleData;
use PHPUnit\Framework\TestCase;

final class SimpleDataTest extends TestCase
{
    private SimpleData $simpleData;

    protected function setUp(): void
    {
        $this->simpleData = new SimpleData();
    }

    public function testNameField(): void
    {
        $name = 'Location';

        $this->simpleData->setName($name);

        self::assertEquals($name, $this->simpleData->getName());
    }

    public function testValueField(): void
    {
        $value = 'London Bridge';

        $this->simpleData->setValue($value);

        self::assertEquals($value, $this->simpleData->getValue());
    }
}
