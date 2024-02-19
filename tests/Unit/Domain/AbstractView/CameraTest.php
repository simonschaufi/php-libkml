<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\AbstractView;

use LibKml\Domain\AbstractView\Camera;
use LibKml\Domain\FieldType\AltitudeMode;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\TimePrimitive\TimeStamp;
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

    public function testDefaultValues(): void
    {
        self::assertEquals(0, $this->camera->getRoll());
    }

    public function testRollField(): void
    {
        $roll = 100.1;

        $this->camera->setRoll($roll);

        self::assertEquals($roll, $this->camera->getRoll());
    }

    public function testAltitudeModeField(): void
    {
        $altitudeMode = AltitudeMode::ABSOLUTE;

        $this->camera->setAltitudeMode($altitudeMode);

        self::assertEquals($altitudeMode, $this->camera->getAltitudeMode());
    }

    public function testTimePrimitive(): void
    {
        $timeStamp = TimeStamp::fromInteger(time());

        $this->camera->setTimePrimitive($timeStamp);

        self::assertEquals($timeStamp, $this->camera->getTimePrimitive());
    }
}
