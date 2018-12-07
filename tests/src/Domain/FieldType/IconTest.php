<?php

namespace LibKml\Tests\Domain\FieldType;

use LibKml\Domain\Icon;
use PHPUnit\Framework\TestCase;

class IconTest extends TestCase {

  /**
   * @var Icon
   */
  protected $icon;

  public function setUp() {
    $this->icon = new Icon();
  }

  public function testLongitudeField() {
    $href = "https://www.google.com";

    $this->icon->setHref($href);

    $this->assertEquals($href, $this->icon->getHref());
  }

}
