<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\AbstractView;

use LibKml\Domain\AbstractView\AbstractView;
use LibKml\Domain\FieldType\AltitudeMode;
use LibKml\Domain\KmlObjectVisitorInterface;
use PHPUnit\Framework\TestCase;

final class AbstractViewTest extends TestCase
{
    /**
     * @var AbstractView
     */
    protected $abstractView;

    protected function setUp(): void
    {
        $this->abstractView = new class() extends AbstractView {
            public function accept(KmlObjectVisitorInterface $visitor): void {}
        };
    }

    public function testDefaultValues(): void
    {
        self::assertEquals(0, $this->abstractView->getLongitude());
        self::assertEquals(0, $this->abstractView->getLatitude());
        self::assertEquals(0, $this->abstractView->getAltitude());
        self::assertEquals(0, $this->abstractView->getHeading());
        self::assertEquals(0, $this->abstractView->getTilt());
        self::assertEquals(AltitudeMode::CLAMP_TO_GROUND, $this->abstractView->getAltitudeMode());
    }

    public function testLongitudeField(): void
    {
        $longitude = -0.2416788;

        $this->abstractView->setLongitude($longitude);

        self::assertEquals($longitude, $this->abstractView->getLongitude());
    }

    public function testLatitudeField(): void
    {
        $latitude = 51.5285582;

        $this->abstractView->setLatitude($latitude);

        self::assertEquals($latitude, $this->abstractView->getLatitude());
    }

    public function testAltitudeField(): void
    {
        $altitude = 11.0;

        $this->abstractView->setAltitude($altitude);

        self::assertEquals($altitude, $this->abstractView->getAltitude());
    }

    public function testHeadingField(): void
    {
        $heading = 193.4;

        $this->abstractView->setHeading($heading);

        self::assertEquals($heading, $this->abstractView->getHeading());
    }

    public function testTiltField(): void
    {
        $tilt = 6.445;

        $this->abstractView->setTilt($tilt);

        self::assertEquals($tilt, $this->abstractView->getTilt());
    }

    public function testAltitudeModeField(): void
    {
        $altitudeMode = 'clampToGround';

        $this->abstractView->setAltitudeMode($altitudeMode);

        self::assertEquals($altitudeMode, $this->abstractView->getAltitudeMode());
    }
}
