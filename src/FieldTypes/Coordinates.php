<?php

namespace KML\FieldTypes;

class Coordinates implements \JsonSerializable
{
    private $longitude = 0;
    private $latitude = 0;
    private $altitude = 0;

    public function jsonSerialize()
    {
        return [
            floatval($this->longitude),
            floatval($this->latitude)
        ];
    }

    public function toWKT(): string
    {
        return implode(" ", [$this->longitude, $this->latitude, $this->altitude]);
    }

    public function toWKT2d()
    {
        return implode(" ", [$this->longitude, $this->latitude]);
    }

    public function __toString()
    {
        return implode(",", [$this->longitude, $this->latitude, $this->altitude]);
    }

    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setAltitude($altitude)
    {
        $this->altitude = $altitude;
    }

    public function getAltitude()
    {
        return $this->altitude;
    }
}
