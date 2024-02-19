<?php

declare(strict_types=1);

namespace LibKml\Domain\FieldType;

class Coordinates
{
    private float $longitude = 0.0;
    private float $latitude = 0.0;
    private float $altitude = 0.0;

    public static function fromLonLatAlt(float $longitude, float $latitude, float $altitude): Coordinates
    {
        $coordinates = self::fromLonLat($longitude, $latitude);
        $coordinates->altitude = $altitude;
        return $coordinates;
    }

    public static function fromLonLat(float $longitude, float $latitude): Coordinates
    {
        $coordinates = new self();
        $coordinates->longitude = $longitude;
        $coordinates->latitude = $latitude;
        return $coordinates;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): void
    {
        $this->longitude = $longitude;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): void
    {
        $this->latitude = $latitude;
    }

    public function getAltitude(): float
    {
        return $this->altitude;
    }

    public function setAltitude(float $altitude): void
    {
        $this->altitude = $altitude;
    }
}
