<?php

namespace LibKml\Tests\Domain\Feature\Overlay;

use LibKml\Domain\Feature\Overlay\ScreenOverlay;
use PHPUnit\Framework\TestCase;

class ScreenOverlayTest extends TestCase {

  /**
   * @var ScreenOverlay
   */
  protected $screenOverlay;

  public function setUp() {
    $this->screenOverlay = new ScreenOverlay();
  }

  public function testRotationField() {
    $screenOverlay = new ScreenOverlay();
  }

}
