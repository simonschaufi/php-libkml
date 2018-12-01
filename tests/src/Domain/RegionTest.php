<?php

namespace LibKml\Tests\Domain;

use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\LatLonAltBox;
use LibKml\Domain\Lod;
use LibKml\Domain\Region;
use PHPUnit\Framework\TestCase;

class RegionTest extends TestCase {

  /**
   * @var Region
   */
  protected $region;

  public function setUp() {
    $this->region = new Region();
  }

  public function testAccept() {
    $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

    $objectVisitor->expects($this->once())
      ->method('visitRegion')
      ->with($this->equalTo($this->region));

    $this->region->accept($objectVisitor);
  }

  public function testLatLonAltBoxField() {
    $latLonAltBox = new LatLonAltBox();

    $this->region->setLatLonAltBox($latLonAltBox);

    $this->assertEquals($latLonAltBox, $this->region->getLatLonAltBox());
  }

  public function testLodField() {
    $lod = new Lod();

    $this->region->setLod($lod);

    $this->assertEquals($lod, $this->region->getLod());
  }

}
