<?php

namespace LibKml\Tests\Domain\AbstractView;

use LibKml\Domain\AbstractView\AbstractView;
use LibKml\Domain\FieldType\AltitudeMode;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

class AbstractViewTest extends TestCase {

  /**
   * @var AbstractView
   */
  protected $abstractView;

  public function setUp() {
    $this->abstractView = new class extends AbstractView {
      public function accept(KmlObjectVisitorInterface $visitor): void {
      }
    };
  }

  public function testDefaultValues() {
    $this->assertEquals(0, $this->abstractView->getLongitude());
    $this->assertEquals(0, $this->abstractView->getLatitude());
    $this->assertEquals(0, $this->abstractView->getAltitude());
    $this->assertEquals(0, $this->abstractView->getHeading());
    $this->assertEquals(0, $this->abstractView->getTilt());
    $this->assertEquals(AltitudeMode::CLAMP_TO_GROUND, $this->abstractView->getAltitudeMode());
  }

  public function testLongitudeField() {
    $longitude = -0.2416788;

    $this->abstractView->setLongitude($longitude);

    $this->assertEquals($longitude, $this->abstractView->getLongitude());
  }

  public function testLatitudeField() {
    $latitude = 51.5285582;

    $this->abstractView->setLatitude($latitude);

    $this->assertEquals($latitude, $this->abstractView->getLatitude());
  }

  public function testAltitudeField() {
    $altitude = 11.0;

    $this->abstractView->setAltitude($altitude);

    $this->assertEquals($altitude, $this->abstractView->getAltitude());
  }

  public function testHeadingField() {
    $heading = 193.4;

    $this->abstractView->setHeading($heading);

    $this->assertEquals($heading, $this->abstractView->getHeading());
  }

  public function testTiltField() {
    $tilt = 6.445;

    $this->abstractView->setTilt($tilt);

    $this->assertEquals($tilt, $this->abstractView->getTilt());
  }

  public function testAltitudeModeField() {
    $altitudeMode = "clampToGround";

    $this->abstractView->setAltitudeMode($altitudeMode);

    $this->assertEquals($altitudeMode, $this->abstractView->getAltitudeMode());
  }

}
