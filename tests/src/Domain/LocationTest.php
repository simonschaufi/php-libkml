<?php

namespace LibKml\Tests\Domain;

use LibKml\Domain\Location;
use PHPUnit\Framework\TestCase;

class LocationTest extends TestCase {

  /**
   * @var Location
   */
  protected $location;

  public function setUp() {
    $this->location = new Location();
  }

  public function testLongitudeField() {
    $longitude = 45.50;

    $this->location->setLongitude($longitude);

    $this->assertEquals($longitude, $this->location->getLongitude());
  }

  public function testLatitudeField() {
    $latitude = 10.333;

    $this->location->setLatitude($latitude);

    $this->assertEquals($latitude, $this->location->getLatitude());
  }

  public function testAltitudeField() {
    $altitude = 0.5;

    $this->location->setAltitude($altitude);

    $this->assertEquals($altitude, $this->location->getAltitude());
  }

}
