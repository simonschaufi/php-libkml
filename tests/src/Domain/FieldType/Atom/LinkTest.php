<?php

namespace LibKml\Tests\Domain\FieldType\Atom;

use LibKml\Domain\FieldType\Atom\Link;
use PHPUnit\Framework\TestCase;

class LinkTest extends TestCase {

  /**
   * @var Link
   */
  protected $link;

  public function setUp() {
    $this->link = new Link();
  }

  public function testHrefField() {
    $href = "http://www.google.com";

    $this->link->setHref($href);

    $this->assertEquals($href, $this->link->getHref());
  }
}
