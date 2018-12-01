<?php

namespace LibKml\Tests\Domain\Geometry;

use LibKml\Domain\Geometry\Alias;
use LibKml\Domain\Geometry\Model;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\Link;
use LibKml\Domain\Location;
use LibKml\Domain\Orientation;
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
    $location = new Location();

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
    $alias1 = new Alias();
    $alias2 = new Alias();

    $resourceMap = [$alias1, $alias2];

    $this->model->setResourceMap($resourceMap);

    $this->assertCount(2, $this->model->getResourceMap());
    $this->assertContains($alias1, $this->model->getResourceMap());
    $this->assertContains($alias2, $this->model->getResourceMap());
  }

}
