<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\Feature\Container;

use LibKml\Domain\Feature\Container\Folder;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

final class FolderTest extends TestCase
{
    public function testAccept(): void
    {
        $folder = new Folder();

        $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

        $objectVisitor->expects(self::once())
          ->method('visitFolder')
          ->with(self::equalTo($folder));

        $folder->accept($objectVisitor);
    }
}
