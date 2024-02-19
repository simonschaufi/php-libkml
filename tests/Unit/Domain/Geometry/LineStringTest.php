<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\Geometry;

use LibKml\Domain\FieldType\Coordinates;
use LibKml\Domain\Geometry\LineString;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

final class LineStringTest extends TestCase
{
    private LineString $lineString;

    protected function setUp(): void
    {
        $this->lineString = new LineString();
    }

    public function testAccept(): void
    {
        $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

        $objectVisitor->expects(self::once())
          ->method('visitLineString')
          ->with(self::equalTo($this->lineString));

        $this->lineString->accept($objectVisitor);
    }

    public function testExtrudeField(): void
    {
        $extrude = true;

        $this->lineString->setExtrude($extrude);

        self::assertEquals($extrude, $this->lineString->getExtrude());
    }

    public function testTessellateField(): void
    {
        $tessellate = true;

        $this->lineString->setTessellate($tessellate);

        self::assertEquals($tessellate, $this->lineString->getTessellate());
    }

    public function testAltitudeModeField(): void
    {
        $altitudeMode = 'relativeToGround';

        $this->lineString->setAltitudeMode($altitudeMode);

        self::assertEquals($altitudeMode, $this->lineString->getAltitudeMode());
    }

    public function testCoordinatesField(): void
    {
        $coordinates1 = new Coordinates();
        $coordinates2 = new Coordinates();

        $coordinates = [$coordinates1, $coordinates2];

        $this->lineString->setCoordinates($coordinates);

        self::assertCount(2, $this->lineString->getCoordinates());
        self::assertContains($coordinates1, $this->lineString->getCoordinates());
        self::assertContains($coordinates2, $this->lineString->getCoordinates());
    }

    public function testAddCoordinate(): void
    {
        $coordinates = new Coordinates();

        $this->lineString->addCoordinates($coordinates);

        self::assertCount(1, $this->lineString->getCoordinates());
        self::assertContains($coordinates, $this->lineString->getCoordinates());
    }

    public function testClearCoordinates(): void
    {
        $coordinates1 = new Coordinates();
        $coordinates2 = new Coordinates();
        $this->lineString->setCoordinates([$coordinates1, $coordinates2]);

        $this->lineString->clearCoordinates();

        self::assertEmpty($this->lineString->getCoordinates());
    }
}
