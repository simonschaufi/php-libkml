<?php

declare(strict_types=1);

namespace LibKml\Writer;

use LibKml\Domain\KmlDocument;

interface WriterInterface
{
    public function generate(KmlDocument $kmlDocument): string;
}
