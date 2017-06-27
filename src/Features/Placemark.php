<?php

namespace KML\Features;

use KML\Geometries\Geometry;

class Placemark extends Feature
{
    /** @var  Geometry */
    private $geometry;

    public function __toString(): string
    {
        $parent_string = parent::__toString();

        $output = [];

        $output[] = sprintf(
            "<Placemark%s>",
            isset($this->id) ? sprintf(" id=\"%s\"", $this->id) : ""
        );
        $output[] = $parent_string;

        if (isset($this->geometry)) {
            $output[] = $this->geometry->__toString();
        }

        $output[] = "</Placemark>";

        return implode("\n", $output);
    }

    public function getAllFeatures()
    {
        return [$this];
    }

    public function toWKT(): string
    {
        if (isset($this->geometry)) {
            return $this->geometry->toWKT();
        } else {
            return '';
        }
    }

    public function toWKT2d(): string
    {
        if (isset($this->geometry)) {
            return $this->geometry->toWKT2d();
        } else {
            return '';
        }
    }

    public function jsonSerialize()
    {
        $json_data = [];

        if (isset($this->geometry)) {
            $json_data = [
                'type'     => 'Feature',
                'geometry' => $this->geometry
            ];
        }

        return $json_data;
    }

    public function toExtGeoJSON()
    {
        $json_data = parent::toExtGeoJSON();

        if (isset($this->geometry)) {
            $json_data = array_merge($json_data, [
                'type'     => 'Feature',
                'geometry' => $this->geometry
            ]);
        }

        return $json_data;
    }

    public function setGeometry(Geometry $geometry)
    {
        $this->geometry = $geometry;
    }

    public function getGeometry(): Geometry
    {
        return $this->geometry;
    }
}
