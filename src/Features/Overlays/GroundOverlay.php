<?php

namespace KML\Features\Overlays;

use KML\Features\AltitudeMode;

class GroundOverlay extends Overlay
{
    private $altitude;
    /** @var  AltitudeMode */
    private $altitudeMode;
    /** @var  LatLonBox */
    private $latLonBox;

    public function __toString(): string
    {
        $parent_string = parent::__toString();

        $output = [];

        $output[] = sprintf(
            "<GroundOverlay%s>",
            isset($this->id) ? sprintf(" id=\"%s\"", $this->id) : ""
        );
        $output[] = $parent_string;

        if (isset($this->altitude)) {
            $output[] = sprintf("\t<altitude>%f</altitude>", $this->altitude);
        }

        if (isset($this->altitudeMode)) {
            $output[] = $this->altitudeMode->__toString();
        }

        if (isset($this->latLonBox)) {
            $output[] = $this->latLonBox->__toString();
        }

        $output[] = "</GroundOverlay>";

        return implode("\n", $output);
    }

    public function toWKT(): string
    {
        return $this->latLonBox->toWKT();
    }

    public function toWKT2d(): string
    {
        return $this->latLonBox->toWKT2d();
    }

    public function jsonSerialize()
    {
        $json_data = [];

        if (isset($this->latLonBox)) {
            $json_data = [
                'type'     => 'Feature',
                'geometry' => $this->latLonBox
            ];
        }

        return $json_data;
    }

    public function toExtGeoJSON()
    {
        $json_data = [];

        if (isset($this->latLonBox)) {
            $json_data = [
                'type'     => 'Feature',
                'geometry' => $this->latLonBox
            ];
        }

        return $json_data;
    }

    public function getAltitude()
    {
        return $this->altitude;
    }

    public function setAltitude($altitude)
    {
        $this->altitude = $altitude;
    }

    public function getAltitudeMode(): AltitudeMode
    {
        return $this->altitudeMode;
    }

    public function setAltitudeMode(AltitudeMode $altitudeMode)
    {
        $this->altitudeMode = $altitudeMode;
    }

    public function getLatLonBox(): LatLonBox
    {
        return $this->latLonBox;
    }

    public function setLatLonBox(LatLonBox $latLonBox)
    {
        $this->latLonBox = $latLonBox;
    }
}
