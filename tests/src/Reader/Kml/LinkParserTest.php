<?php

namespace LibKml\Tests\Reader\Kml;

use LibKml\Domain\Link;
use LibKml\Reader\Kml\LinkParser;
use PHPUnit\Framework\TestCase;

class LinkParserTest extends TestCase {

  const KML_LINK = <<<'TAG'
<Link>
  <href>http://www.example.com/geotiff/NE/MergedReflectivityQComposite.kml</href>
  <refreshMode>onInterval</refreshMode>
  <refreshInterval>30</refreshInterval>
  <viewRefreshMode>onStop</viewRefreshMode>
  <viewRefreshTime>7</viewRefreshTime>
  <viewFormat>BBOX=[bboxWest],[bboxSouth],[bboxEast],[bboxNorth]</viewFormat>
</Link>
TAG;

  /**
   * @var LinkParser
   */
  protected $linkParser;

  /**
   * @var Link
   */
  protected $link;

  public function setUp() {
    $this->linkParser = new LinkParser();
    $kml = simplexml_load_string(self::KML_LINK);
    $this->link = $this->linkParser->parse($kml);
  }

  public function testParseLink() {
    $this->assertInstanceOf(Link::class, $this->link);
  }

  public function testParseHref() {
    $this->assertEquals("http://www.example.com/geotiff/NE/MergedReflectivityQComposite.kml", $this->link->getHref());
  }

  public function testParseRefreshMode() {
    $this->assertEquals("onInterval", $this->link->getRefreshMode());
  }

  public function testParseRefreshInterval() {
    $this->assertEquals("30", $this->link->getRefreshInterval());
  }

  public function testParseViewRefreshMode() {
    $this->assertEquals("onStop", $this->link->getViewRefreshMode());
  }

  public function testParseViewRefreshTime() {
    $this->assertEquals("7", $this->link->getViewRefreshTime());
  }

  public function testParseViewFormat() {
    $this->assertEquals("BBOX=[bboxWest],[bboxSouth],[bboxEast],[bboxNorth]", $this->link->getViewFormat());
  }

}
