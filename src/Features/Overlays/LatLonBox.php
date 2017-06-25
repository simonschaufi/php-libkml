<?php

namespace KML\Features\Overlays;

use KML\KMLObject;

class LatLonBox extends KMLObject implements \JsonSerializable
{
    private $north;
    private $south;
    private $east;
    private $west;
    private $rotation;

    public function __toString(): string
    {
        $output = [];

        if (isset(
            $this->north,
            $this->south,
            $this->east,
            $this->west
        )) {
            $output[] = '<LanLonBox>';

            $output[] = sprintf("<north>%s</north>", $this->north);
            $output[] = sprintf("<south>%s</south>", $this->south);
            $output[] = sprintf("<east>%s</east>", $this->east);
            $output[] = sprintf("<west>%s</west>", $this->west);

            if (isset($this->rotation)) {
                $output[] = sprintf("<rotation>%s</rotation>", $this->rotation);
            }

            $output[] = '</LanLonBox>';
        }

        return implode("\n", $output);
    }

    public function toWKT(): string
    {
        return sprintf(
            "POLYGON ((%s %s, %s %s, %s %s, %s %s, %s %s))",
            $this->west,
            $this->north,
            $this->east,
            $this->north,
            $this->east,
            $this->south,
            $this->west,
            $this->south,
            $this->west,
            $this->north
        );
    }

    public function toWKT2d(): string
    {
        return $this->toWKT();
    }

    public function jsonSerialize()
    {
        $coordinates = [
            [
                [$this->west, $this->north],
                [$this->east, $this->north],
                [$this->east, $this->south],
                [$this->west, $this->south],
                [$this->west, $this->north]
            ]
        ];

        return [
            'type'        => 'Polygon',
            'coordinates' => $coordinates
        ];
    }

    public function toExtGeoJSON()
    {
        return '';
    }

    public function getNorth()
    {
        return $this->north;
    }

    public function setNorth($north)
    {
        $this->north = $north;
    }

    public function getSouth()
    {
        return $this->south;
    }

    public function setSouth($south)
    {
        $this->south = $south;
    }

    public function getEast()
    {
        return $this->east;
    }

    public function setEast($east)
    {
        $this->east = $east;
    }

    public function getWest()
    {
        return $this->west;
    }

    public function setWest($west)
    {
        $this->west = $west;
    }

    public function getRotation()
    {
        return $this->rotation;
    }

    public function setRotation($rotation)
    {
        $this->rotation = $rotation;
    }
}
