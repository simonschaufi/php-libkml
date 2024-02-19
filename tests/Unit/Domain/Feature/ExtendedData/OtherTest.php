<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\Feature\ExtendedData;

use LibKml\Domain\Feature\ExtendedData\Other;
use PHPUnit\Framework\TestCase;

final class OtherTest extends TestCase
{
    /**
     * @var Other
     */
    protected $other;

    protected function setUp(): void
    {
        $this->other = new Other();
    }

    public function testNameField(): void
    {
        $name = 'number';

        $this->other->setName($name);

        self::assertEquals($name, $this->other->getName());
    }

    public function testValueField(): void
    {
        $value = '14';

        $this->other->setValue($value);

        self::assertEquals($value, $this->other->getValue());
    }

    public function testNamespaceField(): void
    {
        $namespace = 'camp';

        $this->other->setNamespace($namespace);

        self::assertEquals($namespace, $this->other->getNamespace());
    }
}
