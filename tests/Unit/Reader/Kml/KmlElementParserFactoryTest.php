<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml;

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
use LibKml\Reader\Kml\Geometry\MultiGeometryParser;
use LibKml\Reader\Kml\Geometry\PointParser;
use LibKml\Reader\Kml\Geometry\PolygonParser;
use LibKml\Reader\Kml\KmlElementParserFactory;
use LibKml\Reader\Kml\LinkParser;
use PHPUnit\Framework\TestCase;

final class KmlElementParserFactoryTest extends TestCase
{
    private KmlElementParserFactory $kmlElementParserFactory;

    protected function setUp(): void
    {
        $this->kmlElementParserFactory = KmlElementParserFactory::getInstance();
    }

    public function testGetParserByElementUnknownTag(): void
    {
        $this->expectException(UnsupportedTagException::class);

        $this->kmlElementParserFactory->getParserByElementName('Unknown');
    }

    public function testGetParserByElementNameLink(): void
    {
        $linkParser = $this->kmlElementParserFactory->getParserByElementName(KmlElementParserFactory::LINK);

        self::assertInstanceOf(LinkParser::class, $linkParser);
    }

    public function testGetParserByElementNameNetworkLink(): void
    {
        $networkLinkParser = $this->kmlElementParserFactory->getParserByElementName(KmlElementParserFactory::NETWORK_LINK);

        self::assertInstanceOf(NetworkLinkParser::class, $networkLinkParser);
    }

    public function testGetParserByElementNamePlacemark(): void
    {
        $placemarkParser = $this->kmlElementParserFactory->getParserByElementName(KmlElementParserFactory::PLACEMARK);

        self::assertInstanceOf(PlacemarkParser::class, $placemarkParser);
    }

    public function testGetParserByElementNamePhotoOverlay(): void
    {
        $photoOverlayParser = $this->kmlElementParserFactory->getParserByElementName(KmlElementParserFactory::PHOTO_OVERLAY);

        self::assertInstanceOf(PhotoOverlayParser::class, $photoOverlayParser);
    }

    public function testGetParserByElementNameScreenOverlay(): void
    {
        $screenOverlayParser = $this->kmlElementParserFactory->getParserByElementName(KmlElementParserFactory::SCREEN_OVERLAY);

        self::assertInstanceOf(ScreenOverlayParser::class, $screenOverlayParser);
    }

    public function testGetParserByElementNameGroundOverlay(): void
    {
        $groundOverlayParser = $this->kmlElementParserFactory->getParserByElementName(KmlElementParserFactory::GROUND_OVERLAY);

        self::assertInstanceOf(GroundOverlayParser::class, $groundOverlayParser);
    }

    public function testGetParserByElementNameFolder(): void
    {
        $folderParser = $this->kmlElementParserFactory->getParserByElementName(KmlElementParserFactory::FOLDER);

        self::assertInstanceOf(FolderParser::class, $folderParser);
    }

    public function testGetParserByElementNameDocument(): void
    {
        $documentParser = $this->kmlElementParserFactory->getParserByElementName(KmlElementParserFactory::DOCUMENT);

        self::assertInstanceOf(DocumentParser::class, $documentParser);
    }

    public function testGetParserByElementNameLineString(): void
    {
        $lineStringParser = $this->kmlElementParserFactory->getParserByElementName(KmlElementParserFactory::LINE_STRING);

        self::assertInstanceOf(LineStringParser::class, $lineStringParser);
    }

    public function testGetParserByElementNameLinearRing(): void
    {
        $linearRingParser = $this->kmlElementParserFactory->getParserByElementName(KmlElementParserFactory::LINEAR_RING);

        self::assertInstanceOf(LinearRingParser::class, $linearRingParser);
    }

    public function testGetParserByElementNameMultiGeometry(): void
    {
        $multiGeometryParser = $this->kmlElementParserFactory->getParserByElementName(KmlElementParserFactory::MULTI_GEOMETRY);

        self::assertInstanceOf(MultiGeometryParser::class, $multiGeometryParser);
    }

    public function testGetParserByElementNamePoint(): void
    {
        $pointParser = $this->kmlElementParserFactory->getParserByElementName(KmlElementParserFactory::POINT);

        self::assertInstanceOf(PointParser::class, $pointParser);
    }

    public function testGetParserByElementNamePolygon(): void
    {
        $pointParser = $this->kmlElementParserFactory->getParserByElementName(KmlElementParserFactory::POLYGON);

        self::assertInstanceOf(PolygonParser::class, $pointParser);
    }
}
