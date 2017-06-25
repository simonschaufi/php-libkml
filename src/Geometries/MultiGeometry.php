<?php

namespace KML\Geometries;

class MultiGeometry extends Geometry
{
    private $geometries = [];

    public function addGeometry($geometry)
    {
        $this->geometries[] = $geometry;
    }

    public function clearGeometries()
    {
        $this->geometries = [];
    }

    public function jsonSerialize()
    {
        $geometries = [];

        foreach ($this->geometries as $geometry) {
            $geometries = array_merge($geometries, $geometry);
        }

        return $geometries;
    }

    public function toWKT(): string
    {
        $geometries = [];

        foreach ($this->geometries as $geometry) {
            $geometries[] = $geometry->toWTK();
        }

        return sprintf("GEOMETRYCOLLECTION(%s)", implode(",", $geometries));
    }

    public function toWKT2d()
    {
        $geometries = [];

        foreach ($this->geometries as $geometry) {
            $geometries[] = $geometry->toWKT2d();
        }

        return sprintf("GEOMETRYCOLLECTION(%s)", implode(",", $geometries));
    }

    public function __toString(): string
    {
        $parent_string = parent::__toString();

        $output = [];
        $output[] = sprintf(
            "<MultiGeometry%s>",
            isset($this->id) ? sprintf(" id=\"%s\"", $this->id) : ""
        );
        $output[] = $parent_string;

        if (isset($this->geometries) && is_array($this->geometries)) {
            $geometries_strings = [];
            foreach ($this->geometries as $geometry) {
                $geometries_strings[] = $geometry->__toString();
            }

            $output[] = sprintf("\t<coordinates>%s</coordinates>", implode(" ", $geometries_strings));
        }

        $output[] = "</MultiGeometry>";

        return implode("\n", $output);
    }

    public function getGeometries()
    {
        return $this->geometries;
    }

    public function setGeometries($geometries)
    {
        $this->geometries = $geometries;
    }
}
