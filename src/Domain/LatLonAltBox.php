<?php

declare(strict_types=1);

namespace LibKml\Domain;

class LatLonAltBox
{
    private ?string $altitudeMode = null;
    private float $minAltitude = 0.0;
    private float $maxAltitude = 0.0;
    private float $north = 0.0;
    private float $south = 0.0;
    private float $east = 0.0;
    private float $west = 0.0;

    public function getAltitudeMode(): string
    {
        return $this->altitudeMode;
    }

    public function setAltitudeMode(string $altitudeMode): void
    {
        $this->altitudeMode = $altitudeMode;
    }

    public function getMinAltitude(): float
    {
        return $this->minAltitude;
    }

    public function setMinAltitude(float $minAltitude): void
    {
        $this->minAltitude = $minAltitude;
    }

    public function getMaxAltitude(): float
    {
        return $this->maxAltitude;
    }

    public function setMaxAltitude(float $maxAltitude): void
    {
        $this->maxAltitude = $maxAltitude;
    }

    public function getNorth(): float
    {
        return $this->north;
    }

    public function setNorth(float $north): void
    {
        $this->north = $north;
    }

    public function getSouth(): float
    {
        return $this->south;
    }

    public function setSouth(float $south): void
    {
        $this->south = $south;
    }

    public function getEast(): float
    {
        return $this->east;
    }

    public function setEast(float $east): void
    {
        $this->east = $east;
    }

    public function getWest(): float
    {
        return $this->west;
    }

    public function setWest(float $west): void
    {
        $this->west = $west;
    }
}
