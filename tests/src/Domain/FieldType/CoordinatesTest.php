<?php

namespace LibKml\Tests\Domain\FieldType;

use LibKml\Domain\FieldType\Coordinates;
use PHPUnit\Framework\TestCase;

class CoordinatesTest extends TestCase {

  /**
   * @var Coordinates
   */
  protected $coordinates;

  private $longitude = -0.2416788;
  private $latitude = 51.5285582;
  private $altitude = 11.5;

  public function setUp() {
    $this->coordinates = new Coordinates();
  }

  public function testLongitudeField() {
    $this->coordinates->setLongitude($this->longitude);

    $this->assertEquals($this->longitude, $this->coordinates->getLongitude());
  }

  public function testLatitudeField() {
    $this->coordinates->setLatitude($this->latitude);

    $this->assertEquals($this->latitude, $this->coordinates->getLatitude());
  }

  public function testAltitudeField() {
    $this->coordinates->setAltitude($this->altitude);

    $this->assertEquals($this->altitude, $this->coordinates->getAltitude());
  }

  public function testFromLonLat() {
    $this->coordinates = Coordinates::fromLonLat($this->longitude, $this->latitude);

    $this->assertEquals($this->longitude, $this->coordinates->getLongitude());
    $this->assertEquals($this->latitude, $this->coordinates->getLatitude());
  }

  public function testFromLonLatAlt() {
    $this->coordinates = Coordinates::fromLonLatAlt($this->longitude, $this->latitude, $this->altitude);

    $this->assertEquals($this->longitude, $this->coordinates->getLongitude());
    $this->assertEquals($this->latitude, $this->coordinates->getLatitude());
    $this->assertEquals($this->altitude, $this->coordinates->getAltitude());
  }

}
