<?php

namespace LibKml\Tests\Domain\AbstractView;

use LibKml\Domain\AbstractView\LookAt;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

class LookAtTest extends TestCase {

  public function testAccept() {
    $lookAt = new LookAt();

    $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

    $objectVisitor->expects($this->once())
      ->method('visitLookAt')
      ->with($this->equalTo($lookAt));

    $lookAt->accept($objectVisitor);
  }

}
