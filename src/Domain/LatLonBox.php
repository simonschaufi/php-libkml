<?php

declare(strict_types=1);

namespace LibKml\Domain;

/**
 * @see https://developers.google.com/kml/documentation/kmlreference#latlonbox
 */
class LatLonBox
{
    private float $north = 0.0;
    private float $south = 0.0;
    private float $east = 0.0;
    private float $west = 0.0;
    private float $rotation = 0.0;

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

    public function getRotation(): float
    {
        return $this->rotation;
    }

    public function setRotation(float $rotation): void
    {
        $this->rotation = $rotation;
    }
}
