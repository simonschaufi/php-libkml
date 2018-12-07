<?php

namespace LibKml\Tests\Reader\Kml;

use LibKml\Reader\Kml\Feature\Container\DocumentParser;
use LibKml\Reader\Kml\Feature\Container\FolderParser;
use LibKml\Reader\Kml\Feature\NetworkLinkParser;
use LibKml\Reader\Kml\Feature\Overlay\GroundOverlayParser;
use LibKml\Reader\Kml\Feature\Overlay\PhotoOverlayParser;
use LibKml\Reader\Kml\Feature\Overlay\ScreenOverlayParser;
use LibKml\Reader\Kml\Feature\PlacemarkParser;
use LibKml\Reader\Kml\Geometry\LinearRingParser;
use LibKml\Reader\Kml\Geometry\MultiGeometryParser;
use LibKml\Reader\Kml\Geometry\PointParser;
use LibKml\Reader\Kml\Geometry\PolygonParser;
use LibKml\Reader\Kml\KmlElementParserFactory;
use LibKml\Reader\Kml\LinkParser;
use LibKml\Reader\Kml\Geometry\LineStringParser;
use LibKml\Reader\Kml\UnsupportedTagException;
use PHPUnit\Framework\TestCase;

class KmlElementParserFactoryTest extends TestCase {

  /**
   * @var KmlElementParserFactory
   */
  protected $kmlElementParserFactory;

  public function setUp() {
    $this->kmlElementParserFactory = KmlElementParserFactory::getInstance();
  }

  public function testGetParserByElementUnknownTag() {
    $this->expectException(UnsupportedTagException::class);

    $this->kmlElementParserFactory->getParserByElementName("Unknown");
  }

  public function testGetParserByElementNameLink() {
    $linkParser = $this->kmlElementParserFactory->getParserByElementName(KmlElementParserFactory::LINK);

    $this->assertInstanceOf(LinkParser::class, $linkParser);
  }

  public function testGetParserByElementNameNetworkLink() {
    $networkLinkParser = $this->kmlElementParserFactory->getParserByElementName(KmlElementParserFactory::NETWORK_LINK);

    $this->assertInstanceOf(NetworkLinkParser::class, $networkLinkParser);
  }

  public function testGetParserByElementNamePlacemark() {
    $placemarkParser = $this->kmlElementParserFactory->getParserByElementName(KmlElementParserFactory::PLACEMARK);

    $this->assertInstanceOf(PlacemarkParser::class, $placemarkParser);
  }

  public function testGetParserByElementNamePhotoOverlay() {
    $photoOverlayParser = $this->kmlElementParserFactory->getParserByElementName(KmlElementParserFactory::PHOTO_OVERLAY);

    $this->assertInstanceOf(PhotoOverlayParser::class, $photoOverlayParser);
  }

  public function testGetParserByElementNameScreenOverlay() {
    $screenOverlayParser = $this->kmlElementParserFactory->getParserByElementName(KmlElementParserFactory::SCREEN_OVERLAY);

    $this->assertInstanceOf(ScreenOverlayParser::class, $screenOverlayParser);
  }

  public function testGetParserByElementNameGroundOverlay() {
    $groundOverlayParser = $this->kmlElementParserFactory->getParserByElementName(KmlElementParserFactory::GROUND_OVERLAY);

    $this->assertInstanceOf(GroundOverlayParser::class, $groundOverlayParser);
  }

  public function testGetParserByElementNameFolder() {
    $folderParser = $this->kmlElementParserFactory->getParserByElementName(KmlElementParserFactory::FOLDER);

    $this->assertInstanceOf(FolderParser::class, $folderParser);
  }

  public function testGetParserByElementNameDocument() {
    $documentParser = $this->kmlElementParserFactory->getParserByElementName(KmlElementParserFactory::DOCUMENT);

    $this->assertInstanceOf(DocumentParser::class, $documentParser);
  }
  
  public function testGetParserByElementNameLineString() {
    $lineStringParser = $this->kmlElementParserFactory->getParserByElementName(KmlElementParserFactory::LINE_STRING);

    $this->assertInstanceOf(LineStringParser::class, $lineStringParser);
  }

  public function testGetParserByElementNameLinearRing() {
    $linearRingParser = $this->kmlElementParserFactory->getParserByElementName(KmlElementParserFactory::LINEAR_RING);

    $this->assertInstanceOf(LinearRingParser::class, $linearRingParser);
  }

  public function testGetParserByElementNameMultiGeometry() {
    $multiGeometryParser = $this->kmlElementParserFactory->getParserByElementName(KmlElementParserFactory::MULTI_GEOMETRY);

    $this->assertInstanceOf(MultiGeometryParser::class, $multiGeometryParser);
  }

  public function testGetParserByElementNamePoint() {
    $pointParser = $this->kmlElementParserFactory->getParserByElementName(KmlElementParserFactory::POINT);

    $this->assertInstanceOf(PointParser::class, $pointParser);
  }

  public function testGetParserByElementNamePolygon() {
    $pointParser = $this->kmlElementParserFactory->getParserByElementName(KmlElementParserFactory::POLYGON);

    $this->assertInstanceOf(PolygonParser::class, $pointParser);
  }

}
