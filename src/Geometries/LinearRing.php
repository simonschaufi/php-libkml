<?php

namespace KML\Geometries;

class LinearRing extends Line
{
    public function toWKT(): string
    {
        $coordinates_strings = [];

        if (count($coordinates_strings)) {
            foreach ($this->coordinates as $coordinate) {
                $coordinates_strings[] = $coordinate->toWKT();
            }

            $first_coordinate = $this->coordinates[0];
            $last_coordinate = end($this->coordinates);
            if ($first_coordinate != $last_coordinate) {
                $coordinates_strings[] = $first_coordinate->toWKT();
            }
        }

        return sprintf("LINESTRING(%s)", implode(", ", $coordinates_strings));
    }

    public function toWKT2d()
    {
        $coordinates_strings = [];

        if (count($coordinates_strings)) {
            foreach ($this->coordinates as $coordinate) {
                $coordinates_strings[] = $coordinate->toWKT2d();
            }

            $first_coordinate = $this->coordinates[0];
            $last_coordinate = end($this->coordinates);
            if ($first_coordinate != $last_coordinate) {
                $coordinates_strings[] = $first_coordinate->toWKT2d();
            }
        }

        return sprintf("LINESTRING(%s)", implode(", ", $coordinates_strings));
    }

    public function jsonSerialize()
    {
        $json_data = null;

        if (count($this->coordinates)) {
            $json_data = [
                'type'        => 'LineString',
                'coordinates' => []
            ];

            foreach ($this->coordinates as $coordinate) {
                $json_data['coordinates'][] = $coordinate;
            }

            $first_coordinate = $this->coordinates[0];
            $last_coordinate = end($this->coordinates);
            if ($first_coordinate != $last_coordinate) {
                $json_data['coordinates'][] = $first_coordinate;
            }
        }

        return $json_data;
    }

    public function __toString(): string
    {
        $output = [];
        $output[] = sprintf(
            "<LinearRing%s>",
            isset($this->id) ? sprintf(" id=\"%s\"", $this->id) : ""
        );

        if (isset($this->extrude)) {
            $output[] = sprintf("\t<extrude>%i</extrude>", $this->extrude);
        }

        if (isset($this->altitudeMode)) {
            $output[] = sprintf("\t<altitudeMode>%s</altitudeMode>", $this->altitudeMode);
        }

        if (count($this->coordinates)) {
            $coordinates_strings = [];
            foreach ($this->coordinates as $coordinate) {
                $coordinates_strings[] = $coordinate->__toString();
            }

            $output[] = sprintf("\t<coordinates>%s</coordinates>", implode(" ", $coordinates_strings));
        }

        $output[] = "</LinearRing>";

        return implode("\n", $output);
    }
}
