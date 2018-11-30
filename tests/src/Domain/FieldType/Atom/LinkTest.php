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

  public function testRelField() {
    $rel = "http://www.google.com/rel";

    $this->link->setRel($rel);

    $this->assertEquals($rel, $this->link->getRel());
  }

  public function testTypeField() {
    $type = "text/html";

    $this->link->setType($type);

    $this->assertEquals($type, $this->link->getType());
  }

  public function testHreflangField() {
    $hreflang = "en";

    $this->link->setHreflang($hreflang);

    $this->assertEquals($hreflang, $this->link->getHreflang());
  }

  public function testTitleField() {
    $title = "Bio page";

    $this->link->setTitle($title);

    $this->assertEquals($title, $this->link->getTitle());
  }

  public function testLengthField() {
    $length = 1024;

    $this->link->setLength($length);

    $this->assertEquals($length, $this->link->getLength());
  }
  
}
