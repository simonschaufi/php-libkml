<?php

namespace LibKml\Tests\Reader\Kml;

use LibKml\Reader\Kml\Feature\PlacemarkParser;
use LibKml\Reader\Kml\Geometry\PointParser;
use LibKml\Reader\Kml\KmlElementParserFactory;
use LibKml\Reader\Kml\LinkParser;
use PHPUnit\Framework\TestCase;

class KmlElementParserFactoryTest extends TestCase {

  /**
   * @var KmlElementParserFactory
   */
  protected $kmlElementParserFactory;

  public function setUp() {
    $this->kmlElementParserFactory = KmlElementParserFactory::getInstance();
  }

  public function testGetParserByElementNameLink() {
    $linkParser = $this->kmlElementParserFactory->getParserByElementName(KmlElementParserFactory::LINK);

    $this->assertInstanceOf(LinkParser::class, $linkParser);
  }

  public function testGetParserByElementNamePlacemark() {
    $linkParser = $this->kmlElementParserFactory->getParserByElementName(KmlElementParserFactory::PLACEMARK);

    $this->assertInstanceOf(PlacemarkParser::class, $linkParser);
  }

  public function testGetParserByElementNamePoint() {
    $linkParser = $this->kmlElementParserFactory->getParserByElementName(KmlElementParserFactory::POINT);

    $this->assertInstanceOf(PointParser::class, $linkParser);
  }

}
