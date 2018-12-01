<?php

namespace LibKml\Tests\Domain\AbstractView;

use LibKml\Domain\AbstractView\Camera;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

class CameraTest extends TestCase {

  public function testAccept() {
    $camera = new Camera();

    $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

    $objectVisitor->expects($this->once())
      ->method('visitCamera')
      ->with($this->equalTo($camera));

    $camera->accept($objectVisitor);
  }

}
