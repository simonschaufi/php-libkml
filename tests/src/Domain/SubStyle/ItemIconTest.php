<?php

namespace LibKml\Tests\Domain\SubStyle;

use LibKml\Domain\FieldType\ItemIconState;
use LibKml\Domain\SubStyle\ItemIcon;
use PHPUnit\Framework\TestCase;

class ItemIconTest extends TestCase {

  /**
   * @var ItemIcon
   */
  protected $itemIcon;

  public function setUp() {
    $this->itemIcon = new ItemIcon();
  }

  public function testDefaultValues() {
    $this->assertEquals(ItemIconState::OPEN, $this->itemIcon->getState());
  }

  public function testHrefField() {
    $href = "http://www.google.com";

    $this->itemIcon->setHref($href);

    $this->assertEquals($href, $this->itemIcon->getHref());
  }

  public function testStateField() {
    $state = "closed";

    $this->itemIcon->setState($state);

    $this->assertEquals($state, $this->itemIcon->getState());
  }

}
