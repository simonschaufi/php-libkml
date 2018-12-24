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

  /**
   * @var Icon
   */
  protected $icon;

  public function setUp() {
    $this->iconParser = new IconParser();
    $kml = simplexml_load_string(self::KML_ICON);
    $this->icon = $this->iconParser->parse($kml);
  }

  public function testParseIcon() {
    $this->assertInstanceOf(Icon::class, $this->icon);
  }

  public function testParseHref() {
    $this->assertEquals("Sunset.jpg", $this->icon->getHref());
  }

  public function testParseRefreshMode() {
    $this->assertEquals(RefreshMode::ON_INTERVAL, $this->icon->getRefreshMode());
  }

  public function testParseRefreshInterval() {
    $this->assertEquals(10, $this->icon->getRefreshInterval());
  }

  public function testParseViewRefreshMode() {
    $this->assertEquals(ViewRefreshMode::ON_REQUEST, $this->icon->getViewRefreshMode());
  }

  public function testParseViewRefreshTime() {
    $this->assertEquals(30, $this->icon->getViewRefreshTime());
  }

  public function testParseViewBoundScale() {
    $this->assertEquals(3, $this->icon->getViewBoundScale());
  }

  public function testParseViewFormat() {
    $this->assertEquals('BBOX=[bboxWest],[bboxSouth],[bboxEast],[bboxNorth]', $this->icon->getViewFormat());
  }

  public function testParseHttpQuery() {
    $this->assertEquals('gv=[clientVersion]', $this->icon->getHttpQuery());
  }
}
