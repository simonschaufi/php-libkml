<?php

namespace LibKml\Tests\Reader\Kml;

use LibKml\Reader\Kml\LinkParser;
use PHPUnit\Framework\TestCase;

class LinkParserTest extends TestCase {

  const KML_LINK = '
<Link>
  <href>http://www.example.com/geotiff/NE/MergedReflectivityQComposite.kml</href>
  <refreshMode>onInterval</refreshMode>
  <refreshInterval>30</refreshInterval>
  <viewRefreshMode>onStop</viewRefreshMode>
  <viewRefreshTime>7</viewRefreshTime>
  <viewFormat>BBOX=[bboxWest],[bboxSouth],[bboxEast],[bboxNorth]</viewFormat>
</Link>';

  /**
   * @var LinkParser
   */
  protected $linkParser;
  protected $kmlElement;

  public function setUp() {
    $this->linkParser = new LinkParser();
    $this->kmlElement = simplexml_load_string(self::KML_LINK);
  }

  public function testParse() {
    $kmlObject = $this->linkParser->parse($this->kmlElement);

    $this->assertEquals("http://www.example.com/geotiff/NE/MergedReflectivityQComposite.kml", $kmlObject->getHref());
    $this->assertEquals("onInterval", $kmlObject->getRefreshMode());
    $this->assertEquals("30", $kmlObject->getRefreshInterval());
    $this->assertEquals("onStop", $kmlObject->getViewRefreshMode());
    $this->assertEquals("7", $kmlObject->getViewRefreshTime());
    $this->assertEquals("BBOX=[bboxWest],[bboxSouth],[bboxEast],[bboxNorth]", $kmlObject->getViewFormat());
  }

}
