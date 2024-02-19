<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain;

use LibKml\Domain\LatLonBox;
use PHPUnit\Framework\TestCase;

final class LatLonBoxTest extends TestCase
{
    private LatLonBox $latLonBox;

    protected function setUp(): void
    {
        $this->latLonBox = new LatLonBox();
    }

    public function testDefaultValues(): void
    {
        self::assertEquals(0, $this->latLonBox->getRotation());
    }

    public function testNorthField(): void
    {
        $north = 48.25475939255556;

        $this->latLonBox->setNorth($north);

        self::assertEquals($north, $this->latLonBox->getNorth());
    }

    public function testSouthField(): void
    {
        $south = 48.25207367852141;

        $this->latLonBox->setSouth($south);

        self::assertEquals($south, $this->latLonBox->getSouth());
    }

    public function testEastField(): void
    {
        $east = -90.86591508839973;

        $this->latLonBox->setEast($east);

        self::assertEquals($east, $this->latLonBox->getEast());
    }

    public function testWestField(): void
    {
        $west = -90.8714285289695;

        $this->latLonBox->setWest($west);

        self::assertEquals($west, $this->latLonBox->getWest());
    }

    public function testRotationField(): void
    {
        $rotation = 39.37878630116985;

        $this->latLonBox->setRotation($rotation);

        self::assertEquals($rotation, $this->latLonBox->getRotation());
    }
}
