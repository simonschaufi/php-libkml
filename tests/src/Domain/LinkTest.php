<?php

namespace LibKml\Tests\Domain;

use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\Link;
use PHPUnit\Framework\TestCase;

class LinkTest extends TestCase {

  /**
   * @var Link
   */
  protected $link;

  public function setUp() {
    $this->link = new Link();
  }

  public function testAccept() {
    $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

    $objectVisitor->expects($this->once())
      ->method('visitLink')
      ->with($this->equalTo($this->link));

    $this->link->accept($objectVisitor);
  }

  public function testHrefField() {
    $href = "http://www.google.com";

    $this->link->setHref($href);

    $this->assertEquals($href, $this->link->getHref());
  }

  public function testRefreshModeField() {
    $refreshMode = "onInterval";

    $this->link->setRefreshMode($refreshMode);

    $this->assertEquals($refreshMode, $this->link->getRefreshMode());
  }

}
