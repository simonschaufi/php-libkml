<?php

namespace LibKml\Reader\Kml;

use LibKml\Reader\Kml\Feature\PlacemarkParser;
use LibKml\Reader\Kml\Geometry\PointParser;

class KmlElementParserFactory {

  const LINK = "Link";

  const PLACEMARK = "Placemark";

  const POINT = "Point";

  private static $instance;

  private $parsers = [];

  private function __construct() {
  }

  public static function getInstance(): KmlElementParserFactory {
    if (!isset(self::$instance)) {
      self::$instance = new KmlElementParserFactory();
    }
    return self::$instance;
  }

  public function getParserByElementName(string $name): KmlElementParserInterface {
    if (!array_key_exists($name, $this->parsers)) {
      switch ($name) {
        case self::LINK:
          $this->parsers[$name] = new LinkParser();
          break;

        case self::PLACEMARK:
          $this->parsers[$name] = new PlacemarkParser();
          break;

        case self::POINT:
          $this->parsers[$name] = new PointParser();
          break;
      }
    }
    return $this->parsers[$name];
  }

}
