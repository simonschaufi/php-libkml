<?php

namespace LibKml\Tests\Reader\Kml\Feature;

use LibKml\Domain\AbstractView\AbstractView;
use LibKml\Domain\AbstractView\Camera;
use LibKml\Domain\Geometry\Point;
use LibKml\Reader\Kml\Feature\PlacemarkParser;
use PHPUnit\Framework\TestCase;

class PlacemarkParserTest extends TestCase {

  const KML_PLACEMARK = <<<'TAG'
<Placemark id="placemark-1" targetId="target-1">
  <name>My office</name>
  <visibility>0</visibility>
  <open>1</open>  
  <address>Blackfriards 240</address>
  <phoneNumber>tel:+44 7890123456789</phoneNumber>
  <Snippet>Office location</Snippet>
  <description>This is the location of my office.</description>
  <Camera>
    <longitude>170.157</longitude>
    <latitude>-43.671</latitude>
    <altitude>9700</altitude>
    <heading>-6.333</heading>
    <tilt>33.5</tilt>
    <roll>12.5</roll>
    <altitudeMode>absolute</altitudeMode>
  </Camera>
  <styleUrl>#myIconStyle</styleUrl>
  
  
  <Point>
    <coordinates>-122.087461,37.422069</coordinates>
  </Point>
</Placemark>
TAG;

  /**
   * @var PlacemarkParser
   */
  protected $placemarkParser;
  protected $placemarkKmlElement;
  protected $placemark;

  public function setUp() {
    $this->placemarkParser = new PlacemarkParser();
    $this->placemarkKmlElement = simplexml_load_string(self::KML_PLACEMARK);
    $this->placemark = $this->placemarkParser->parse($this->placemarkKmlElement);
  }

  public function testParseId() {
    $this->assertEquals("placemark-1", $this->placemark->getId());
  }

  public function testParseTargetId() {
    $this->assertEquals("target-1", $this->placemark->getTargetId());
  }

  public function testParseName() {
    $this->assertEquals("My office", $this->placemark->getName());
  }

  public function testParseVisibility() {
    $this->assertFalse($this->placemark->getVisibility());
  }

  public function testParseOpen() {
    $this->assertTrue($this->placemark->getOpen());
  }

  public function testParseAddress() {
    $this->assertEquals("Blackfriards 240", $this->placemark->getAddress());
  }

  public function testParsePhoneNumber() {
    $this->assertEquals("tel:+44 7890123456789", $this->placemark->getPhoneNumber());
  }

  public function testParseSnippet() {
    $this->assertEquals("Office location", $this->placemark->getSnippet());
  }

  public function testParseDescription() {
    $this->assertEquals("This is the location of my office.", $this->placemark->getDescription());
  }

  public function testParseAbstractView() {
    $this->assertInstanceOf(Camera::class, $this->placemark->getAbstractView());
  }

  public function testParseStyleUrl() {
    $this->assertEquals("#myIconStyle", $this->placemark->getStyleUrl());
  }

  public function testParseGeometry() {
    $this->assertInstanceOf(Point::class, $this->placemark->getGeometry());
  }

}
