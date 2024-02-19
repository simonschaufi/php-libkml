<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\Geometry;

use LibKml\Domain\FieldType\Coordinates;
use LibKml\Domain\Geometry\Point;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

final class PointTest extends TestCase
{
    private Point $point;

    protected function setUp(): void
    {
        $this->point = new Point();
    }

    public function testAccept(): void
    {
        $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

        $objectVisitor->expects(self::once())
          ->method('visitPoint')
          ->with(self::equalTo($this->point));

        $this->point->accept($objectVisitor);
    }

    public function testExtrudeField(): void
    {
        $extrude = true;

        $this->point->setExtrude($extrude);

        self::assertEquals($extrude, $this->point->getExtrude());
    }

    public function testAltitudeModeField(): void
    {
        $altitudeMode = 'relativeToGround';

        $this->point->setAltitudeMode($altitudeMode);

        self::assertEquals($altitudeMode, $this->point->getAltitudeMode());
    }

    public function testCoordinatesField(): void
    {
        $coordinates = new Coordinates();

        $this->point->setCoordinates($coordinates);

        self::assertEquals($coordinates, $this->point->getCoordinates());
    }
}
