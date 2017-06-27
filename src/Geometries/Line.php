<?php

namespace KML\Geometries;

use KML\FieldTypes\Coordinates;

abstract class Line extends GeometrySimple
{
    protected $coordinates = [];

    public function addCoordinate(Coordinates $coordinate)
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
