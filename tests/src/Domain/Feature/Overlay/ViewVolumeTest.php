<?php

namespace LibKml\Tests\Domain\Feature\Overlay;

use LibKml\Domain\Feature\Overlay\ViewVolume;
use PHPUnit\Framework\TestCase;

class ViewVolumeTest extends TestCase {

  /**
   * @var ViewVolume
   */
  protected $viewVolume;

  public function setUp() {
    $this->viewVolume = new ViewVolume();
  }

  public function testLeftFovField() {
    $leftFov = 26.4554;

    $this->viewVolume->setLeftFov($leftFov);

    $this->assertEquals($leftFov, $this->viewVolume->getLeftFov());
  }

  public function testRightFovField() {
    $leftFov = 26.4554;

    $this->viewVolume->setRightFov($leftFov);

    $this->assertEquals($leftFov, $this->viewVolume->getRightFov());
  }

  public function testBottomFovField() {
    $leftFov = 26.4554;

    $this->viewVolume->setBottomFov($leftFov);

    $this->assertEquals($leftFov, $this->viewVolume->getBottomFov());
  }

  public function testTopFovField() {
    $leftFov = 26.4554;

    $this->viewVolume->setTopFov($leftFov);

    $this->assertEquals($leftFov, $this->viewVolume->getTopFov());
  }

  public function testNearField() {
    $leftFov = 26.4554;

    $this->viewVolume->setNear($leftFov);

    $this->assertEquals($leftFov, $this->viewVolume->getNear());
  }

}
