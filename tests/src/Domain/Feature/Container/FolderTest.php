<?php

namespace LibKml\Tests\Domain\Feature\Container;

use LibKml\Domain\Feature\Container\Folder;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

class FolderTest extends TestCase {

  public function testAccept() {
    $folder = new Folder();

    $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

    $objectVisitor->expects($this->once())
      ->method('visitFolder')
      ->with($this->equalTo($folder));

    $folder->accept($objectVisitor);
  }

}
