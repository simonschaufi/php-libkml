<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain;

use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\LatLonAltBox;
use LibKml\Domain\Lod;
use LibKml\Domain\Region;
use PHPUnit\Framework\TestCase;

final class RegionTest extends TestCase
{
    /**
     * @var Region
     */
    protected $region;

    protected function setUp(): void
    {
        $this->region = new Region();
    }

    public function testAccept(): void
    {
        $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

        $objectVisitor->expects(self::once())
          ->method('visitRegion')
          ->with(self::equalTo($this->region));

        $this->region->accept($objectVisitor);
    }

    public function testLatLonAltBoxField(): void
    {
        $latLonAltBox = new LatLonAltBox();

        $this->region->setLatLonAltBox($latLonAltBox);

        self::assertEquals($latLonAltBox, $this->region->getLatLonAltBox());
    }

    public function testLodField(): void
    {
        $lod = new Lod();

        $this->region->setLod($lod);

        self::assertEquals($lod, $this->region->getLod());
    }
}
