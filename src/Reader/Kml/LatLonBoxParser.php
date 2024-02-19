<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml;

use LibKml\Domain\LatLonBox;

class LatLonBoxParser
{
    public static function parse(\SimpleXMLElement $kmlElement): LatLonBox
    {
        $latLonBox = new LatLonBox();

        if (isset($kmlElement->north)) {
            $latLonBox->setNorth((float)$kmlElement->north);
        }

        if (isset($kmlElement->south)) {
            $latLonBox->setSouth((float)$kmlElement->south);
        }

        if (isset($kmlElement->east)) {
            $latLonBox->setEast((float)$kmlElement->east);
        }

        if (isset($kmlElement->west)) {
            $latLonBox->setWest((float)$kmlElement->west);
        }

        if (isset($kmlElement->rotation)) {
            $latLonBox->setRotation((float)$kmlElement->rotation);
        }

        return $latLonBox;
    }
}
