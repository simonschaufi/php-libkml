<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\Feature;

use LibKml\Domain\Feature\Placemark;
use LibKml\Domain\Geometry\Polygon;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

final class PlacemarkTest extends TestCase
{
    /**
     * @var Placemark
     */
    protected $placemark;

    protected function setUp(): void
    {
        $this->placemark = new Placemark();
    }

    public function testAccept(): void
    {
        $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

        $objectVisitor->expects(self::once())
          ->method('visitPlacemark')
          ->with(self::equalTo($this->placemark));

        $this->placemark->accept($objectVisitor);
    }

    public function testGeometryField(): void
    {
        $geometry = new Polygon();

        $this->placemark->setGeometry($geometry);

        self::assertEquals($geometry, $this->placemark->getGeometry());
    }
}
