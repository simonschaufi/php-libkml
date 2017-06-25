<?php

namespace KML\Geometries;

abstract class Line extends GeometrySimple
{
    protected $coordinates = [];

    public function addCoordinate($coordinate)
    {
        $this->coordinates[] = $coordinate;
    }

    public function clearCoordinates()
    {
        $this->coordinates = [];
    }

    public function getCoordinates()
    {
        return $this->coordinates;
    }

    public function setCoordinates($coordinates)
    {
        $this->coordinates = $coordinates;
    }
}
