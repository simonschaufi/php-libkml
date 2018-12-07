<?php

namespace LibKml\Tests\Domain;

use LibKml\Domain\LatLonBox;
use PHPUnit\Framework\TestCase;

class LatLonBoxTest extends TestCase {

  /**
   * @var LatLonBox
   */
  protected $latLonBox;

  public function setUp() {
    $this->latLonBox = new LatLonBox();
  }

  public function testDefaultValues() {
    $this->assertEquals(0, $this->latLonBox->getRotation());
  }

  public function testNorthField() {
    $north = 48.25475939255556;

    $this->latLonBox->setNorth($north);

    $this->assertEquals($north, $this->latLonBox->getNorth());
  }

  public function testSouthField() {
    $south = 48.25207367852141;

    $this->latLonBox->setSouth($south);

    $this->assertEquals($south, $this->latLonBox->getSouth());
  }

  public function testEastField() {
    $east = -90.86591508839973;

    $this->latLonBox->setEast($east);

    $this->assertEquals($east, $this->latLonBox->getEast());
  }

  public function testWestField() {
    $west = -90.8714285289695;

    $this->latLonBox->setWest($west);

    $this->assertEquals($west, $this->latLonBox->getWest());
  }

  public function testRotationField() {
    $rotation = 39.37878630116985;

    $this->latLonBox->setRotation($rotation);

    $this->assertEquals($rotation, $this->latLonBox->getRotation());
  }

}
