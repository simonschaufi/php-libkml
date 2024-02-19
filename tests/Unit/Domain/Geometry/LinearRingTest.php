<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\Geometry;

use LibKml\Domain\FieldType\AltitudeMode;
use LibKml\Domain\FieldType\Coordinates;
use LibKml\Domain\Geometry\LinearRing;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

final class LinearRingTest extends TestCase
{
    /**
     * @var LinearRing
     */
    protected $linearRing;

    protected function setUp(): void
    {
        $this->linearRing = new LinearRing();
    }

    public function testDefaultValues(): void
    {
        self::assertFalse($this->linearRing->getExtrude());
        self::assertFalse($this->linearRing->getTessellate());
        self::assertEquals(AltitudeMode::RELATIVE_TO_GROUND, $this->linearRing->getAltitudeMode());
    }

    public function testAccept(): void
    {
        $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

        $objectVisitor->expects(self::once())
          ->method('visitLinearRing')
          ->with(self::equalTo($this->linearRing));

        $this->linearRing->accept($objectVisitor);
    }

    public function testExtrudeField(): void
    {
        $extrude = true;

        $this->linearRing->setExtrude($extrude);

        self::assertEquals($extrude, $this->linearRing->getExtrude());
    }

    public function testTessellateField(): void
    {
        $tessellate = true;

        $this->linearRing->setTessellate($tessellate);

        self::assertEquals($tessellate, $this->linearRing->getTessellate());
    }

    public function testAltitudeModeField(): void
    {
        $altitudeMode = 'relativeToGround';

        $this->linearRing->setAltitudeMode($altitudeMode);

        self::assertEquals($altitudeMode, $this->linearRing->getAltitudeMode());
    }

    public function testCoordinatesField(): void
    {
        $coordinates1 = new Coordinates();
        $coordinates2 = new Coordinates();

        $coordinates = [$coordinates1, $coordinates2];

        $this->linearRing->setCoordinates($coordinates);

        self::assertCount(2, $this->linearRing->getCoordinates());
        self::assertContains($coordinates1, $this->linearRing->getCoordinates());
        self::assertContains($coordinates2, $this->linearRing->getCoordinates());
    }

    public function testAddCoordinate(): void
    {
        $coordinates = new Coordinates();

        $this->linearRing->addCoordinates($coordinates);

        self::assertCount(1, $this->linearRing->getCoordinates());
        self::assertContains($coordinates, $this->linearRing->getCoordinates());
    }

    public function testClearCoordinates(): void
    {
        $coordinates1 = new Coordinates();
        $coordinates2 = new Coordinates();
        $this->linearRing->setCoordinates([$coordinates1, $coordinates2]);

        $this->linearRing->clearCoordinates();

        self::assertEmpty($this->linearRing->getCoordinates());
    }
}
