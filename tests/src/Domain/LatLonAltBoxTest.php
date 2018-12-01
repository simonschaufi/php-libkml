<?php

namespace LibKml\Tests\Domain;

use LibKml\Domain\LatLonAltBox;
use PHPUnit\Framework\TestCase;

class LatLonAltBoxTest extends TestCase {

  /**
   * @var LatLonAltBox
   */
  protected $latLonAltBox;

  public function setUp() {
    $this->latLonAltBox = new LatLonAltBox();
  }

  public function testAltitudeModeField() {
    $altitudeMode = "relativeToGround";

    $this->latLonAltBox->setAltitudeMode($altitudeMode);

    $this->assertEquals($altitudeMode, $this->latLonAltBox->getAltitudeMode());
  }

  public function testMinAltitudeField() {
    $minAltitude = 1;

    $this->latLonAltBox->setMinAltitude($minAltitude);

    $this->assertEquals($minAltitude, $this->latLonAltBox->getMinAltitude());
  }

  public function testMaxAltitudeField() {
    $maxAltitude = 15;

    $this->latLonAltBox->setMaxAltitude($maxAltitude);

    $this->assertEquals($maxAltitude, $this->latLonAltBox->getMaxAltitude());
  }

  public function testNorthField() {
    $north = 48.25475939255556;

    $this->latLonAltBox->setNorth($north);

    $this->assertEquals($north, $this->latLonAltBox->getNorth());
  }

  public function testSouthField() {
    $south = 48.25207367852141;

    $this->latLonAltBox->setSouth($south);

    $this->assertEquals($south, $this->latLonAltBox->getSouth());
  }

  public function testEastField() {
    $east = -90.86591508839973;

    $this->latLonAltBox->setEast($east);

    $this->assertEquals($east, $this->latLonAltBox->getEast());
  }

  public function testWestField() {
    $west = -90.8714285289695;

    $this->latLonAltBox->setWest($west);

    $this->assertEquals($west, $this->latLonAltBox->getWest());
  }

}