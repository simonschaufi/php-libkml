<?php

namespace LibKml\Tests\Domain\Feature\Overlay;

use LibKml\Domain\Feature\Overlay\ImagePyramid;
use LibKml\Domain\Feature\Overlay\PhotoOverlay;
use LibKml\Domain\Feature\Overlay\ViewVolume;

use LibKml\Domain\FieldType\Coordinates;
use PHPUnit\Framework\TestCase;

class PhotoOverlayTest extends TestCase {

  /**
   * @var PhotoOverlay
   */
  protected $photoOverlay;

  public function setUp() {
    $this->photoOverlay = new PhotoOverlay();
  }

  public function testRotationField() {
    $rotation = 13.24;

    $this->photoOverlay->setRotation($rotation);

    $this->assertEquals($rotation, $this->photoOverlay->getRotation());
  }

  public function testViewVolumeField() {
    $viewVolume = new ViewVolume();

    $this->photoOverlay->setViewVolume($viewVolume);

    $this->assertEquals($viewVolume, $this->photoOverlay->getViewVolume());
  }

  public function testImagePyramidField() {
    $imagePyramid = new ImagePyramid();

    $this->photoOverlay->setImagePyramid($imagePyramid);

    $this->assertEquals($imagePyramid, $this->photoOverlay->getImagePyramid());
  }

  public function testPointField() {
    $point = new Coordinates();

    $this->photoOverlay->setPoint($point);

    $this->assertEquals($point, $this->photoOverlay->getPoint());
  }

  public function testShapeField() {
    $shape = "cylinder";

    $this->photoOverlay->setShape($shape);

    $this->assertEquals($shape, $this->photoOverlay->getShape());
  }

}
