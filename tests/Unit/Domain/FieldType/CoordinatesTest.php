<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Domain\FieldType;

use LibKml\Domain\FieldType\Coordinates;
use PHPUnit\Framework\TestCase;

final class CoordinatesTest extends TestCase
{
    /**
     * @var Coordinates
     */
    protected $coordinates;

    private float $longitude = -0.2416788;
    private float $latitude = 51.5285582;
    private float $altitude = 11.5;

    protected function setUp(): void
    {
        $this->coordinates = new Coordinates();
    }

    public function testLongitudeField(): void
    {
        $this->coordinates->setLongitude($this->longitude);

        self::assertEquals($this->longitude, $this->coordinates->getLongitude());
    }

    public function testLatitudeField(): void
    {
        $this->coordinates->setLatitude($this->latitude);

        self::assertEquals($this->latitude, $this->coordinates->getLatitude());
    }

    public function testAltitudeField(): void
    {
        $this->coordinates->setAltitude($this->altitude);

        self::assertEquals($this->altitude, $this->coordinates->getAltitude());
    }

    public function testFromLonLat(): void
    {
        $this->coordinates = Coordinates::fromLonLat($this->longitude, $this->latitude);

        self::assertEquals($this->longitude, $this->coordinates->getLongitude());
        self::assertEquals($this->latitude, $this->coordinates->getLatitude());
    }

    public function testFromLonLatAlt(): void
    {
        $this->coordinates = Coordinates::fromLonLatAlt($this->longitude, $this->latitude, $this->altitude);

        self::assertEquals($this->longitude, $this->coordinates->getLongitude());
        self::assertEquals($this->latitude, $this->coordinates->getLatitude());
        self::assertEquals($this->altitude, $this->coordinates->getAltitude());
    }
}
