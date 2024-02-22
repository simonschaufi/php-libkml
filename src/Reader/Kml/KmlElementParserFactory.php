<?php

declare(strict_types=1);

namespace LibKml\Reader\Kml;

use LibKml\Reader\Kml\AbstractView\CameraParser;
use LibKml\Reader\Kml\AbstractView\LookAtParser;
use LibKml\Reader\Kml\Exception\UnsupportedTagException;
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
use LibKml\Reader\Kml\StyleSelector\StyleParser;
use LibKml\Reader\Kml\SubStyle\BalloonStyleParser;
use LibKml\Reader\Kml\SubStyle\ColorStyle\IconStyleParser;
use LibKml\Reader\Kml\SubStyle\ColorStyle\LabelStyleParser;
use LibKml\Reader\Kml\SubStyle\ColorStyle\LineStyleParser;
use LibKml\Reader\Kml\SubStyle\ColorStyle\PolyStyleParser;
use LibKml\Reader\Kml\SubStyle\ListStyleParser;
use LibKml\Reader\Kml\TimePrimitive\TimeSpanParser;
use LibKml\Reader\Kml\TimePrimitive\TimeStampParser;

class KmlElementParserFactory
{
    public const ICON = 'Icon';
    public const LINK = 'Link';

    public const NETWORK_LINK = 'NetworkLink';
    public const PLACEMARK = 'Placemark';
    public const PHOTO_OVERLAY = 'PhotoOverlay';
    public const SCREEN_OVERLAY = 'ScreenOverlay';
    public const GROUND_OVERLAY = 'GroundOverlay';
    public const FOLDER = 'Folder';
    public const DOCUMENT = 'Document';

    public const LINE_STRING = 'LineString';
    public const LINEAR_RING = 'LinearRing';
    public const MODEL = 'Model';
    public const MULTI_GEOMETRY = 'MultiGeometry';
    public const POINT = 'Point';
    public const POLYGON = 'Polygon';

    public const CAMERA = 'Camera';
    public const LOOK_AT = 'LookAt';

    public const TIME_SPAN = 'TimeSpan';
    public const TIME_STAMP = 'TimeStamp';

    public const STYLE = 'Style';
    public const BALLOON_STYLE = 'BalloonStyle';
    public const LIST_STYLE = 'ListStyle';
    public const ICON_STYLE = 'IconStyle';
    public const LABEL_STYLE = 'LabelStyle';
    public const LINE_STYLE = 'LineStyle';
    public const POLY_STYLE = 'PolyStyle';

    private static KmlElementParserFactory $instance;

    private array $parsers = [];

    private function __construct() {}

    public static function getInstance(): KmlElementParserFactory
    {
        if (!isset(self::$instance)) {
            self::$instance = new KmlElementParserFactory();
        }
        return self::$instance;
    }

    /**
     * @throws UnsupportedTagException
     */
    public function getParserByElementName(string $name): KmlElementParserInterface
    {
        if (array_key_exists($name, $this->parsers)) {
            return $this->parsers[$name];
        }

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

            case self::TIME_SPAN:
                $this->parsers[$name] = new TimeSpanParser();
                break;

            case self::TIME_STAMP:
                $this->parsers[$name] = new TimeStampParser();
                break;

            case self::STYLE:
                $this->parsers[$name] = new StyleParser();
                break;

            case self::BALLOON_STYLE:
                $this->parsers[$name] = new BalloonStyleParser();
                break;

            case self::LIST_STYLE:
                $this->parsers[$name] = new ListStyleParser();
                break;

            case self::ICON_STYLE:
                $this->parsers[$name] = new IconStyleParser();
                break;

            case self::LABEL_STYLE:
                $this->parsers[$name] = new LabelStyleParser();
                break;

            case self::LINE_STYLE:
                $this->parsers[$name] = new LineStyleParser();
                break;

            case self::POLY_STYLE:
                $this->parsers[$name] = new PolyStyleParser();
                break;

            default:
                throw new UnsupportedTagException("Tag $name not supported");
        }

        return $this->parsers[$name];
    }
}
