<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\Feature\Overlay;

use LibKml\Domain\Feature\Overlay\ScreenOverlay;
use LibKml\Domain\FieldType\Vec2;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

final class ScreenOverlayTest extends TestCase
{
    private ScreenOverlay $screenOverlay;

    protected function setUp(): void
    {
        $this->screenOverlay = new ScreenOverlay();
    }

    public function testAccept(): void
    {
        $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

        $objectVisitor->expects(self::once())
          ->method('visitScreenOverlay')
          ->with(self::equalTo($this->screenOverlay));

        $this->screenOverlay->accept($objectVisitor);
    }

    public function testRotationField(): void
    {
        $rotation = 23.74;

        $this->screenOverlay->setRotation($rotation);

        self::assertEquals($rotation, $this->screenOverlay->getRotation());
    }

    public function testOverlayXYField(): void
    {
        $overlayXY = new Vec2();

        $this->screenOverlay->setOverlayXY($overlayXY);

        self::assertEquals($overlayXY, $this->screenOverlay->getOverlayXY());
    }

    public function testScreenXYField(): void
    {
        $screenXY = new Vec2();

        $this->screenOverlay->setScreenXY($screenXY);

        self::assertEquals($screenXY, $this->screenOverlay->getScreenXY());
    }

    public function testRotationXYField(): void
    {
        $rotationXY = new Vec2();

        $this->screenOverlay->setRotationXY($rotationXY);

        self::assertEquals($rotationXY, $this->screenOverlay->getRotationXY());
    }

    public function testSizeField(): void
    {
        $size = new Vec2();

        $this->screenOverlay->setSize($size);

        self::assertEquals($size, $this->screenOverlay->getSize());
    }
}
