<?php

namespace LibKml\Tests\Domain\Feature\Overlay;

use LibKml\Domain\Feature\Overlay\ImagePyramid;
use PHPUnit\Framework\TestCase;

class ImagePyramidTest extends TestCase {

  /**
   * @var ImagePyramid
   */
  protected $imagePyramid;

  public function setUp() {
    $this->imagePyramid = new ImagePyramid();
  }
  
  public function testTileSizeField() {
    $tileSize = 256;

    $this->imagePyramid->setTileSize($tileSize);

    $this->assertEquals($tileSize, $this->imagePyramid->getTileSize());
  }

  public function testMaxWidthField() {
    $maxWidth = 256;

    $this->imagePyramid->setMaxWidth($maxWidth);

    $this->assertEquals($maxWidth, $this->imagePyramid->getMaxWidth());
  }

  public function testMaxHeightField() {
    $maxHeight = 256;

    $this->imagePyramid->setMaxHeight($maxHeight);

    $this->assertEquals($maxHeight, $this->imagePyramid->getMaxHeight());
  }

  public function testGridOriginField() {
    $gridOrigin = "lowerLeft";

    $this->imagePyramid->setGridOrigin($gridOrigin);

    $this->assertEquals($gridOrigin, $this->imagePyramid->getGridOrigin());
  }

}
