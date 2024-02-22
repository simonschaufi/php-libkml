<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\Feature\Overlay;

use LibKml\Domain\Feature\Overlay\GroundOverlay;
use LibKml\Domain\FieldType\AltitudeMode;
use LibKml\Domain\FieldType\Color;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\LatLonBox;
use PHPUnit\Framework\TestCase;

final class GroundOverlayTest extends TestCase
{
    private GroundOverlay $groundOverlay;

    protected function setUp(): void
    {
        $this->groundOverlay = new GroundOverlay();
    }

    public function testDefaultValues(): void
    {
        self::assertEquals(Color::fromRGBA(0xFF, 0xFF, 0xFF, 1), $this->groundOverlay->getColor());
        self::assertEquals(0, $this->groundOverlay->getDrawOrder());
        self::assertNull($this->groundOverlay->getIcon());
        self::assertEquals(0, $this->groundOverlay->getAltitude());
        self::assertEquals(AltitudeMode::CLAMP_TO_GROUND, $this->groundOverlay->getAltitudeMode());
        self::assertNull($this->groundOverlay->getLatLonBox());
    }

    public function testAccept(): void
    {
        $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

        $objectVisitor->expects(self::once())
          ->method('visitGroundOverlay')
          ->with(self::equalTo($this->groundOverlay));

        $this->groundOverlay->accept($objectVisitor);
    }

    public function testAltitudeField(): void
    {
        $altitude = 125;

        $this->groundOverlay->setAltitude($altitude);

        self::assertEquals($altitude, $this->groundOverlay->getAltitude());
    }

    public function testAltitudeModeField(): void
    {
        $altitudeMode = 'clampToGround';

        $this->groundOverlay->setAltitudeMode($altitudeMode);

        self::assertEquals($altitudeMode, $this->groundOverlay->getAltitudeMode());
    }

    public function testLatLonBoxField(): void
    {
        $latLonBox = new LatLonBox();

        $this->groundOverlay->setLatLonBox($latLonBox);

        self::assertEquals($latLonBox, $this->groundOverlay->getLatLonBox());
    }
}
