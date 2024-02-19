<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\AbstractView;

use LibKml\Domain\AbstractView\Camera;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

final class CameraTest extends TestCase
{
    private Camera $camera;

    protected function setUp(): void
    {
        $this->camera = new Camera();
    }

    public function testAccept(): void
    {
        $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

        $objectVisitor->expects(self::once())
          ->method('visitCamera')
          ->with(self::equalTo($this->camera));

        $this->camera->accept($objectVisitor);
    }

    public function testRollField(): void
    {
        $roll = 100.1;

        $this->camera->setRoll($roll);

        self::assertEquals($roll, $this->camera->getRoll());
    }
}
