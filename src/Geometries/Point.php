<?php

namespace KML\Geometries;

use KML\Features\AltitudeMode;
use KML\FieldTypes\Coordinates;

class Point extends Geometry
{

    private $extrude;
    /** @var  AltitudeMode */
    private $altitudeMode;
    /** @var  Coordinates */
    private $coordinate;

    public function clearCoordinates()
    {
        $this->coordinate = null;
    }

    public function getCoordinate(): Coordinates
    {
        return $this->coordinate;
    }

    public function setCoordinate(Coordinates $coordinate)
    {
        $this->coordinate = $coordinate;
    }

    public function toWKT(): string
    {
        $wtk_data = '';

        if (isset($this->coordinate)) {
            $wtk_data = sprintf("POINT (%s)", $this->coordinate->toWKT());
        }

        return $wtk_data;
    }


    public function toWKT2d()
    {
        $wtk_data = '';

        if (isset($this->coordinates)) {
            $wtk_data = sprintf("POINT (%s)", $this->coordinates->toWKT2d());
        }

        return $wtk_data;
    }

    public function jsonSerialize()
    {
        $json_data = null;

        if (isset($this->coordinates)) {
            $json_data = [
                'type'        => 'Point',
                'coordinates' => $this->coordinates
            ];
        }

        return $json_data;
    }

    public function __toString(): string
    {
        $output = [];
        $output[] = sprintf(
            "<Point%s>",
            isset($this->id) ? sprintf(" id=\"%s\"", $this->id) : ""
        );

        if (isset($this->extrude)) {
            $output[] = sprintf("\t<extrude>%d</extrude>", $this->extrude);
        }

        if (isset($this->altitudeMode)) {
            $output[] = sprintf("\t<altitudeMode>%s</altitudeMode>", $this->altitudeMode->__toString());
        }

        if (isset($this->coordinates)) {
            $output[] = sprintf("\t<coordinates>%s</coordinates>", $this->coordinates->__toString());
        }

        $output[] = "</Point>";

        return implode("\n", $output);
    }

    public function getExtrude()
    {
        return $this->extrude;
    }

    public function setExtrude($extrude)
    {
        $this->extrude = $extrude;
    }

    public function getAltitudeMode(): AltitudeMode
    {
        return $this->altitudeMode;
    }

    public function setAltitudeMode(AltitudeMode $altitudeMode)
    {
        $this->altitudeMode = $altitudeMode;
    }
}