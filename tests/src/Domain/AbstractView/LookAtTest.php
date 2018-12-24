<?php

namespace LibKml\Tests\Domain\AbstractView;

use LibKml\Domain\AbstractView\LookAt;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

class LookAtTest extends TestCase {

  /**
   * @var LookAt
   */
  protected $lookAt;

  public function setUp() {
    $this->lookAt = new LookAt();
  }

  public function testAccept() {
    $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

    $objectVisitor->expects($this->once())
      ->method('visitLookAt')
      ->with($this->equalTo($this->lookAt));

    $this->lookAt->accept($objectVisitor);
  }

  public function testDefaultValues() {
    $this->assertEquals(0, $this->lookAt->getRange());
  }

  public function testRangeField() {
    $range = 1234.45;

    $this->lookAt->setRange($range);

    $this->assertEquals($range, $this->lookAt->getRange());
  }

}
