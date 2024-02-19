<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\FieldType;

use LibKml\Domain\FieldType\Alias;
use PHPUnit\Framework\TestCase;

final class AliasTest extends TestCase
{
    private Alias $aliasTest;

    protected function setUp(): void
    {
        $this->aliasTest = new Alias();
    }

    public function testTargetHrefField(): void
    {
        $this->aliasTest->setTargetHref('http://www.google.com');

        self::assertEquals('http://www.google.com', $this->aliasTest->getTargetHref());
    }

    public function testSourceHrefField(): void
    {
        $this->aliasTest->setSourceHref('http://www.google.com');

        self::assertEquals('http://www.google.com', $this->aliasTest->getSourceHref());
    }
}
