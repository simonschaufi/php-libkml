<?php

declare(strict_types=1);

namespace LibKml\Writer\Kml;

use LibKml\Domain\KmlDocument;
use LibKml\Writer\WriterInterface;

class KmlWriter implements WriterInterface
{
    /**
     * Generates the KmlDocument in KML format schema version 2.2.
     */
    public function generate(KmlDocument $kmlDocument): string
    {
        // TODO: Implement generate() method.
    }
}
