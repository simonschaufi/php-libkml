<?php

namespace LibKml\Tests\Domain;

use LibKml\Domain\Lod;
use PHPUnit\Framework\TestCase;

class LodTest extends TestCase {

  /**
   * @var Lod
   */
  protected $lod;

  public function setUp() {
    $this->lod = new Lod();
  }

  public function testMinLodPixelsField() {
    $minLodPixels = 256;

    $this->lod->setMinLodPixels($minLodPixels);

    $this->assertEquals($minLodPixels, $this->lod->getMinLodPixels());
  }

  public function testMaxLodPixelsField() {
    $maxLodPixels = 1024;

    $this->lod->setMaxLodPixels($maxLodPixels);

    $this->assertEquals($maxLodPixels, $this->lod->getMaxLodPixels());
  }

  public function testMinFadeExtentField() {
    $minFadeExtent = 256;

    $this->lod->setMinFadeExtent($minFadeExtent);

    $this->assertEquals($minFadeExtent, $this->lod->getMinFadeExtent());
  }

  public function testMaxFadeExtentField() {
    $maxFadeExtent = 256;

    $this->lod->setMaxFadeExtent($maxFadeExtent);

    $this->assertEquals($maxFadeExtent, $this->lod->getMaxFadeExtent());
  }

}
