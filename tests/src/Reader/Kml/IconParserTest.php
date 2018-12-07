<?php

namespace LibKml\Tests\Reader\Kml;

use LibKml\Domain\FieldType\RefreshMode;
use LibKml\Domain\FieldType\ViewRefreshMode;
use LibKml\Domain\Icon;
use LibKml\Reader\Kml\IconParser;
use PHPUnit\Framework\TestCase;

class IconParserTest extends TestCase {

  const KML_ICON = <<<'TAG'
<Icon>
  <href>Sunset.jpg</href>
  <refreshMode>onInterval</refreshMode>
  <refreshInterval>10</refreshInterval>
  <viewRefreshMode>onRequest</viewRefreshMode>
  <viewRefreshTime>30</viewRefreshTime>
  <viewBoundScale>3</viewBoundScale>
  <viewFormat>BBOX=[bboxWest],[bboxSouth],[bboxEast],[bboxNorth]</viewFormat>
  <httpQuery>gv=[clientVersion]</httpQuery>
</Icon>
TAG;

  /**
   * @var IconParser
   */
  protected $iconParser;

  public function setUp() {
    $this->iconParser = new IconParser();
  }

  public function testParse() {
    $kml = simplexml_load_string(self::KML_ICON);

    $kmlObject = $this->iconParser->parse($kml);

    $this->assertInstanceOf(Icon::class, $kmlObject);
    $this->assertEquals("Sunset.jpg", $kmlObject->getHref());
    $this->assertEquals(RefreshMode::ON_INTERVAL, $kmlObject->getRefreshMode());
    $this->assertEquals(10, $kmlObject->getRefreshInterval());
    $this->assertEquals(ViewRefreshMode::ON_REQUEST, $kmlObject->getViewRefreshMode());
    $this->assertEquals(30, $kmlObject->getViewRefreshTime());
    $this->assertEquals(3, $kmlObject->getViewBoundScale());
    $this->assertEquals('BBOX=[bboxWest],[bboxSouth],[bboxEast],[bboxNorth]', $kmlObject->getViewFormat());
    $this->assertEquals('gv=[clientVersion]', $kmlObject->getHttpQuery());
  }
}
