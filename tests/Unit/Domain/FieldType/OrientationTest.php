<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\FieldType;

use LibKml\Domain\FieldType\Orientation;
use PHPUnit\Framework\TestCase;

final class OrientationTest extends TestCase
{
    /**
     * @var Orientation
     */
    protected $orientation;

    protected function setUp(): void
    {
        $this->orientation = new Orientation();
    }

    public function testDefaultValues(): void
    {
        self::assertEquals(0, $this->orientation->getHeading());
        self::assertEquals(0, $this->orientation->getTilt());
        self::assertEquals(0, $this->orientation->getRoll());
    }

    public function testFromHeadingTiltRoll(): void
    {
        $heading = 34.5;
        $tilt = 40.67;
        $roll = 15.3;

        $orientation = Orientation::fromHeadingTiltRoll($heading, $tilt, $roll);

        self::assertEquals($heading, $orientation->getHeading());
        self::assertEquals($tilt, $orientation->getTilt());
        self::assertEquals($roll, $orientation->getRoll());
    }

    public function testHeadingField(): void
    {
        $heading = 16.04;

        $this->orientation->setHeading($heading);

        self::assertEquals($heading, $this->orientation->getHeading());
    }

    public function testTiltField(): void
    {
        $tilt = 16.04;

        $this->orientation->setTilt($tilt);

        self::assertEquals($tilt, $this->orientation->getTilt());
    }

    public function testRollField(): void
    {
        $roll = 16.04;

        $this->orientation->setRoll($roll);

        self::assertEquals($roll, $this->orientation->getRoll());
    }
}
