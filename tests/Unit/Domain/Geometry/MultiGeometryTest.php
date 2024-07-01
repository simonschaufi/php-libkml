<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\Geometry;

use LibKml\Domain\Geometry\MultiGeometry;
use LibKml\Domain\Geometry\Point;
use LibKml\Domain\Geometry\Polygon;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

final class MultiGeometryTest extends TestCase
{
    private MultiGeometry $multiGeometry;

    private Point $point;
    private Polygon $polygon;
    private array $geometries;

    protected function setUp(): void
    {
        $this->multiGeometry = new MultiGeometry();

        $this->point = new Point();
        $this->polygon = new Polygon();
        $this->geometries = [$this->point, $this->polygon];
    }

    public function testAccept(): void
    {
        $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

        $objectVisitor->expects(self::once())
          ->method('visitMultiGeometry')
          ->with(self::equalTo($this->multiGeometry));

        $this->multiGeometry->accept($objectVisitor);
    }

    public function testGeometriesField(): void
    {
        $this->multiGeometry->setGeometries($this->geometries);

        self::assertCount(2, $this->multiGeometry->getGeometries());
        self::assertContains($this->point, $this->multiGeometry->getGeometries());
        self::assertContains($this->polygon, $this->multiGeometry->getGeometries());
    }

    public function testAddGeometry(): void
    {
        $this->multiGeometry->addGeometry($this->point);

        self::assertCount(1, $this->multiGeometry->getGeometries());
        self::assertContains($this->point, $this->multiGeometry->getGeometries());
    }

    public function testClearGeometries(): void
    {
        $this->multiGeometry->setGeometries($this->geometries);

        $this->multiGeometry->clearGeometries();

        self::assertCount(0, $this->multiGeometry->getGeometries());
    }
}
