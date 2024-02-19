<?php

declare(strict_types=1);

namespace LibKml\Reader;

use LibKml\Reader\Kml\KmlParser;
use LibKml\UnsupportedFormat;

class ParserFactory
{
    public const KML = 'kml';

    private static ParserFactory $instance;

    private array $parsers = [];

    public static function getInstance(): ParserFactory
    {
        if (!isset(self::$instance)) {
            self::$instance = new ParserFactory();
        }
        return self::$instance;
    }

    private function __construct() {}

    /**
     * Returns a parser for the type argument
     *
     * @throws UnsupportedFormat
     */
    public function getParser(string $type): ParserInterface
    {
        if (!array_key_exists($type, $this->parsers)) {
            switch ($type) {
                case self::KML:
                    $this->parsers[$type] = new KmlParser();
                    break;

                default:
                    throw new UnsupportedFormat();
            }
        }

        return $this->parsers[$type];
    }
}
