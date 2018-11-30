<?php

namespace LibKml\Tests\Domain\Feature\Overlay;

use LibKml\Domain\Feature\Overlay\PhotoOverlay;
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
    $rotation = 13;

    $this->photoOverlay->setRotation($rotation);

    $this->assertEquals($rotation, $this->photoOverlay->getRotation());
  }
}
