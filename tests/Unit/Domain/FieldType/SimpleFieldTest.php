<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\FieldType;

use LibKml\Domain\FieldType\SimpleField;
use PHPUnit\Framework\TestCase;

final class SimpleFieldTest extends TestCase
{
    private SimpleField $simpleField;

    protected function setUp(): void
    {
        $this->simpleField = new SimpleField();
    }

    public function testNameField(): void
    {
        $name = 'London Bridge';

        $this->simpleField->setName($name);

        self::assertEquals($name, $this->simpleField->getName());
    }

    public function testTypeField(): void
    {
        $type = 'London Bridge';

        $this->simpleField->setType($type);

        self::assertEquals($type, $this->simpleField->getType());
    }

    public function testDisplayNameField(): void
    {
        $displayName = 'London Bridge';

        $this->simpleField->setDisplayName($displayName);

        self::assertEquals($displayName, $this->simpleField->getDisplayName());
    }
}
