<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain;

use LibKml\Domain\KmlObject;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

final class KMLObjectTest extends TestCase
{
    private KmlObject $kmlObject;

    protected function setUp(): void
    {
        $this->kmlObject = new class() extends KmlObject {
            public function accept(KmlObjectVisitorInterface $visitor): void {}
        };
    }

    public function testIdField(): void
    {
        $this->kmlObject->setId('ad993');

        self::assertEquals('ad993', $this->kmlObject->getId());
    }

    public function testTargetIdField(): void
    {
        $this->kmlObject->setTargetId('ad993');

        self::assertEquals('ad993', $this->kmlObject->getTargetId());
    }
}
