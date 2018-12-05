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
  protected $kmlElement;

  public function setUp() {
    $this->placemarkParser = new PlacemarkParser();
    $this->kmlElement = simplexml_load_string(self::KML_PLACEMARK);
  }

  public function testParse() {
    $kmlObject = $this->placemarkParser->parse($this->kmlElement);

    $this->assertEquals("placemark-1", $kmlObject->getId());
    $this->assertEquals("target-1", $kmlObject->getTargetId());

    $this->assertEquals("My office", $kmlObject->getName());
    $this->assertFalse($kmlObject->getVisibility());
    $this->assertTrue($kmlObject->getOpen());
    $this->assertEquals("Blackfriards 240", $kmlObject->getAddress());
    $this->assertEquals("tel:+44 7890123456789", $kmlObject->getPhoneNumber());
    $this->assertEquals("Office location", $kmlObject->getSnippet());
    $this->assertEquals("This is the location of my office.", $kmlObject->getDescription());
    $this->assertInstanceOf(Camera::class, $kmlObject->getView());
    $this->assertEquals("#myIconStyle", $kmlObject->getStyleUrl());

    $this->assertInstanceOf(Point::class, $kmlObject->getGeometry());
  }

}
