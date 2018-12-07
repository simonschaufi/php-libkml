<?php

namespace LibKml\Reader\Kml;

use LibKml\Reader\Kml\AbstractView\CameraParser;
use LibKml\Reader\Kml\AbstractView\LookAtParser;
use LibKml\Reader\Kml\Feature\Container\DocumentParser;
use LibKml\Reader\Kml\Feature\Container\FolderParser;
use LibKml\Reader\Kml\Feature\NetworkLinkParser;
use LibKml\Reader\Kml\Feature\Overlay\GroundOverlayParser;
use LibKml\Reader\Kml\Feature\Overlay\PhotoOverlayParser;
use LibKml\Reader\Kml\Feature\Overlay\ScreenOverlayParser;
use LibKml\Reader\Kml\Feature\PlacemarkParser;
use LibKml\Reader\Kml\Geometry\LinearRingParser;
use LibKml\Reader\Kml\Geometry\LineStringParser;
use LibKml\Reader\Kml\Geometry\ModelParser;
use LibKml\Reader\Kml\Geometry\MultiGeometryParser;
use LibKml\Reader\Kml\Geometry\PointParser;
use LibKml\Reader\Kml\Geometry\PolygonParser;

class KmlElementParserFactory {

  const ICON = "Icon";
  const LINK = "Link";

  const NETWORK_LINK = "NetworkLink";
  const PLACEMARK = "Placemark";
  const PHOTO_OVERLAY = 'PhotoOverlay';
  const SCREEN_OVERLAY = 'ScreenOverlay';
  const GROUND_OVERLAY = 'GroundOverlay';
  const FOLDER = 'Folder';
  const DOCUMENT = 'Document';

  const LINE_STRING = "LineString";
  const LINEAR_RING = "LinearRing";
  const MODEL = "Model";
  const MULTI_GEOMETRY = "MultiGeometry";
  const POINT = "Point";
  const POLYGON = "Polygon";

  const CAMERA = "Camera";
  const LOOK_AT = "LookAt";

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
        case self::ICON:
          $this->parsers[$name] = new IconParser();
          break;

        case self::LINK:
          $this->parsers[$name] = new LinkParser();
          break;

        case self::NETWORK_LINK:
          $this->parsers[$name] = new NetworkLinkParser();
          break;

        case self::PLACEMARK:
          $this->parsers[$name] = new PlacemarkParser();
          break;

        case self::PHOTO_OVERLAY:
          $this->parsers[$name] = new PhotoOverlayParser();
          break;

        case self::GROUND_OVERLAY:
          $this->parsers[$name] = new GroundOverlayParser();
          break;

        case self::SCREEN_OVERLAY:
          $this->parsers[$name] = new ScreenOverlayParser();
          break;

        case self::FOLDER:
          $this->parsers[$name] = new FolderParser();
          break;

        case self::DOCUMENT:
          $this->parsers[$name] = new DocumentParser();
          break;

        case self::LINE_STRING:
          $this->parsers[$name] = new LineStringParser();
          break;

        case self::LINEAR_RING:
          $this->parsers[$name] = new LinearRingParser();
          break;

        case self::MODEL:
          $this->parsers[$name] = new ModelParser();
          break;

        case self::MULTI_GEOMETRY:
          $this->parsers[$name] = new MultiGeometryParser();
          break;

        case self::POINT:
          $this->parsers[$name] = new PointParser();
          break;

        case self::POLYGON:
          $this->parsers[$name] = new PolygonParser();
          break;

        case self::CAMERA:
          $this->parsers[$name] = new CameraParser();
          break;

        case self::LOOK_AT:
          $this->parsers[$name] = new LookAtParser();
          break;

        default:
          throw new UnsupportedTagException("Tag $name not supported");
      }
    }

    return $this->parsers[$name];
  }

}
