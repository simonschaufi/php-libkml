<?php

namespace LibKml\Tests\Domain\FieldType;

use LibKml\Domain\FieldType\Coordinates;
use PHPUnit\Framework\TestCase;

class CoordinatesTest extends TestCase {

  /**
   * @var Coordinates
   */
  protected $coordinates;

  public function setUp() {
    $this->coordinates = new Coordinates();
  }

  public function testLongitudeField() {
    $longitude = -0.2416788;

    $this->coordinates->setLongitude($longitude);

    $this->assertEquals($longitude, $this->coordinates->getLongitude());
  }

  public function testLatitudeField() {
    $latitude = 51.5285582;

    $this->coordinates->setLatitude($latitude);

    $this->assertEquals($latitude, $this->coordinates->getLatitude());
  }

  public function testAltitudeField() {
    $altitude = 11;

    $this->coordinates->setAltitude($altitude);

    $this->assertEquals($altitude, $this->coordinates->getAltitude());
  }

}
