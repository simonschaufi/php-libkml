<?php

namespace LibKml\Tests\Domain\Geometry;

use LibKml\Domain\FieldType\Alias;
use LibKml\Domain\FieldType\AltitudeMode;
use LibKml\Domain\FieldType\Coordinates;
use LibKml\Domain\FieldType\ResourceMap;
use LibKml\Domain\Geometry\Model;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\Link;
use LibKml\Domain\FieldType\Orientation;
use LibKml\Domain\Scale;
use PHPUnit\Framework\TestCase;

class ModelTest extends TestCase {

  /**
   * @var Model
   */
  protected $model;

  public function setUp() {
    $this->model = new Model();
  }

  public function testDefaultValues() {
    $this->assertEquals(AltitudeMode::CLAMP_TO_GROUND, $this->model->getAltitudeMode());
  }

  public function testAccept() {
    $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

    $objectVisitor->expects($this->once())
      ->method('visitModel')
      ->with($this->equalTo($this->model));

    $this->model->accept($objectVisitor);
  }

  public function testAltitudeModeField() {
    $altitudeMode = "relativeToGround";

    $this->model->setAltitudeMode($altitudeMode);

    $this->assertEquals($altitudeMode, $this->model->getAltitudeMode());
  }

  public function testLocationField() {
    $location = new Coordinates();

    $this->model->setLocation($location);

    $this->assertEquals($location, $this->model->getLocation());
  }

  public function testOrientationField() {
    $orientation = new Orientation();

    $this->model->setOrientation($orientation);

    $this->assertEquals($orientation, $this->model->getOrientation());
  }

  public function testScaleField() {
    $scale = new Scale();

    $this->model->setScale($scale);

    $this->assertEquals($scale, $this->model->getScale());
  }

  public function testLinkField() {
    $link = new Link();

    $this->model->setLink($link);

    $this->assertEquals($link, $this->model->getLink());
  }

  public function testResourceMapField() {
    $resourceMap = new ResourceMap();

    $this->model->setResourceMap($resourceMap);

    $this->assertEquals($resourceMap, $this->model->getResourceMap());
  }

}
