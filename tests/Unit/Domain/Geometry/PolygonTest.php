<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\Geometry;

use LibKml\Domain\FieldType\AltitudeMode;
use LibKml\Domain\Geometry\LinearRing;
use LibKml\Domain\Geometry\Polygon;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

final class PolygonTest extends TestCase
{
    /**
     * @var Polygon
     */
    protected $polygon;

    protected function setUp(): void
    {
        $this->polygon = new Polygon();
    }

    public function testDefaultValues(): void
    {
        self::assertFalse($this->polygon->getExtrude());
        self::assertFalse($this->polygon->getTessellate());
        self::assertEquals(AltitudeMode::CLAMP_TO_GROUND, $this->polygon->getAltitudeMode());
    }

    public function testAccept(): void
    {
        $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

        $objectVisitor->expects(self::once())
          ->method('visitPolygon')
          ->with(self::equalTo($this->polygon));

        $this->polygon->accept($objectVisitor);
    }

    public function testExtrudeField(): void
    {
        $extrude = true;

        $this->polygon->setExtrude($extrude);

        self::assertEquals($extrude, $this->polygon->getExtrude());
    }

    public function testTessellateField(): void
    {
        $tessellate = true;

        $this->polygon->setTessellate($tessellate);

        self::assertEquals($tessellate, $this->polygon->getTessellate());
    }

    public function testAltitudeModeField(): void
    {
        $altitudeMode = 'relativeToGround';

        $this->polygon->setAltitudeMode($altitudeMode);

        self::assertEquals($altitudeMode, $this->polygon->getAltitudeMode());
    }

    public function testOuterBoundaryIsField(): void
    {
        $outerBoundaryIs = new LinearRing();

        $this->polygon->setOuterBoundaryIs($outerBoundaryIs);

        self::assertEquals($outerBoundaryIs, $this->polygon->getOuterBoundaryIs());
    }

    public function testInnerBoundaryIsField(): void
    {
        $innerBoundaryIs = new LinearRing();

        $this->polygon->setInnerBoundaryIs($innerBoundaryIs);

        self::assertEquals($innerBoundaryIs, $this->polygon->getInnerBoundaryIs());
    }
}
