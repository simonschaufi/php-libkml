<?php

namespace LibKml\Tests\Reader\Kml\Geometry;

use LibKml\Domain\Geometry\LineString;
use LibKml\Domain\Geometry\Point;
use LibKml\Reader\Kml\Geometry\MultiGeometryParser;
use PHPUnit\Framework\TestCase;

class MultiGeometryParserTest extends TestCase {

  const KML_MULTI_GEOMETRY = <<<'TAG'
<MultiGeometry>
  <Point>
    <coordinates>-122.442558793,37.80666418607323,10</coordinates>
  </Point>
  <LineString>
    <coordinates>
      -122.4425587930444,37.80666418607323,0
      -122.4428379594768,37.80663578323093,0
    </coordinates>
  </LineString>
  <LineString>
    <coordinates>
      -122.4425509770566,37.80662588061205,0
      -122.4428340530617,37.8065999493009,0
    </coordinates>
  </LineString>
</MultiGeometry>
TAG;

  /**
   * @var MultiGeometryParser
   */
  protected $multiGeometry;
  protected $kmlElement;

  public function setUp() {
    $this->multiGeometry = new MultiGeometryParser();
    $this->kmlElement = simplexml_load_string(self::KML_MULTI_GEOMETRY);
  }

  public function testParse() {
    $kmlObject = $this->multiGeometry->parse($this->kmlElement);

    $this->assertCount(3, $kmlObject->getGeometries());
    $this->assertInstanceOf(Point::class, $kmlObject->getGeometries()[0]);
    $this->assertInstanceOf(LineString::class, $kmlObject->getGeometries()[1]);
    $this->assertInstanceOf(LineString::class, $kmlObject->getGeometries()[2]);
  }

}
