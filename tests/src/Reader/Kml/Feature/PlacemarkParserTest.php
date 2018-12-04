<?php

namespace LibKml\Tests\Reader\Kml\Feature;

use LibKml\Domain\Geometry\Point;
use LibKml\Reader\Kml\Feature\PlacemarkParser;
use PHPUnit\Framework\TestCase;

class PlacemarkParserTest extends TestCase {

  const KML_PLACEMARK = '
<Placemark id="placemark-1" targetId="target-1">
  <name>My office</name>
  <visibility>1</visibility>
  <address>Blackfriards 240</address>
  <phoneNumber>tel:+44 7890123456789</phoneNumber>
  <Snippet>Office location</Snippet>
  <description>This is the location of my office.</description>
  <styleUrl>#myIconStyle</styleUrl>
  <Point>
    <coordinates>-122.087461,37.422069</coordinates>
  </Point>
</Placemark>';

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
  }

}
