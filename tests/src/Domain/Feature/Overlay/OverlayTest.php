<?php

namespace LibKml\Tests\Domain\Feature\Overlay;

use LibKml\Domain\Feature\Overlay\Overlay;
use LibKml\Domain\FieldType\Color;
use LibKml\Domain\Icon;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

class OverlayTest extends TestCase {

  /**
   * @var Overlay
   */
  protected $overlay;

  public function setUp() {
    $this->overlay = new class extends Overlay {
      public function accept(KmlObjectVisitorInterface $visitor): void {
      }
    };
  }

  public function testColorField() {
    $color = new Color();

    $this->overlay->setColor($color);

    $this->assertEquals($color, $this->overlay->getColor());
  }

  public function testDrawOrderField() {
    $drawOrder = 13;

    $this->overlay->setDrawOrder($drawOrder);

    $this->assertEquals($drawOrder, $this->overlay->getDrawOrder());
  }

  public function testIconField() {
    $icon = new Icon();

    $this->overlay->setIcon($icon);

    $this->assertEquals($icon, $this->overlay->getIcon());
  }

}
