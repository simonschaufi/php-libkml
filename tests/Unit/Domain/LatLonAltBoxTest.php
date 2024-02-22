<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain;

use LibKml\Domain\LatLonAltBox;
use PHPUnit\Framework\TestCase;

final class LatLonAltBoxTest extends TestCase
{
    private LatLonAltBox $latLonAltBox;

    protected function setUp(): void
    {
        $this->latLonAltBox = new LatLonAltBox();
    }

    public function testAltitudeModeField(): void
    {
        $altitudeMode = 'relativeToGround';

        $this->latLonAltBox->setAltitudeMode($altitudeMode);

        self::assertEquals($altitudeMode, $this->latLonAltBox->getAltitudeMode());
    }

    public function testMinAltitudeField(): void
    {
        $minAltitude = 1;

        $this->latLonAltBox->setMinAltitude($minAltitude);

        self::assertEquals($minAltitude, $this->latLonAltBox->getMinAltitude());
    }

    public function testMaxAltitudeField(): void
    {
        $maxAltitude = 15;

        $this->latLonAltBox->setMaxAltitude($maxAltitude);

        self::assertEquals($maxAltitude, $this->latLonAltBox->getMaxAltitude());
    }

    public function testNorthField(): void
    {
        $north = 48.25475939255556;

        $this->latLonAltBox->setNorth($north);

        self::assertEquals($north, $this->latLonAltBox->getNorth());
    }

    public function testSouthField(): void
    {
        $south = 48.25207367852141;

        $this->latLonAltBox->setSouth($south);

        self::assertEquals($south, $this->latLonAltBox->getSouth());
    }

    public function testEastField(): void
    {
        $east = -90.86591508839973;

        $this->latLonAltBox->setEast($east);

        self::assertEquals($east, $this->latLonAltBox->getEast());
    }

    public function testWestField(): void
    {
        $west = -90.8714285289695;

        $this->latLonAltBox->setWest($west);

        self::assertEquals($west, $this->latLonAltBox->getWest());
    }
}
