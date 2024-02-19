<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\Feature\ExtendedData;

use LibKml\Domain\Feature\ExtendedData\Data;
use PHPUnit\Framework\TestCase;

final class DataTest extends TestCase
{
    private Data $data;

    protected function setUp(): void
    {
        $this->data = new Data();
    }

    public function testNameField(): void
    {
        $name = 'Location';

        $this->data->setName($name);

        self::assertEquals($name, $this->data->getName());
    }

    public function testValueField(): void
    {
        $value = 'London Bridge';

        $this->data->setValue($value);

        self::assertEquals($value, $this->data->getValue());
    }

    public function testDisplayNameField(): void
    {
        $displayName = 'London Bridge';

        $this->data->setDisplayName($displayName);

        self::assertEquals($displayName, $this->data->getDisplayName());
    }
}
