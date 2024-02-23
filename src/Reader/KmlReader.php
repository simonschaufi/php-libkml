<?php

declare(strict_types=1);

namespace LibKml\Reader;

use LibKml\Domain\KmlDocument;

class KmlReader
{
    private ParserFactory $parserFactory;

    public function __construct(ParserFactory $parserFactory = null)
    {
        if ($parserFactory === null) {
            $parserFactory = ParserFactory::getInstance();
        }
        $this->parserFactory = $parserFactory;
    }

    /**
     * Build a KmlDocument from a KML string
     */
    public function fromString(string $kml): KmlDocument
    {
        return $this->parse($kml);
    }

    /**
     * Build a KmlDocument from a KML file
     */
    public function fromKmlFile(string $kmlFile): KmlDocument
    {
        $kml = file_get_contents($kmlFile);
        return $this->parse($kml);
    }

    private function parse(string $content): KmlDocument
    {
        $parser = $this->parserFactory->getParser(ParserFactory::KML);
        return $parser->parse($content);
    }
}
