<?php

namespace LibKml\Tests\Reader\Kml\Geometry;

use LibKml\Domain\FieldType\Coordinates;
use LibKml\Reader\Kml\Geometry\PointParser;
use PHPUnit\Framework\TestCase;

class PointParserTest extends TestCase {

  const KML_POINT = <<<'TAG'
<Point id="point-1" targetId="target-id-1">
  <extrude>1</extrude>
  <coordinates>-90.86948943473118,48.25450093195546</coordinates>
</Point>
TAG;

  /**
   * @var PointParser
   */
  protected $pointParser;
  protected $kmlElement;

  public function setUp() {
    $this->pointParser = new PointParser();
    $this->kmlElement = simplexml_load_string(self::KML_POINT);
  }

  public function testParse() {
    $kmlObject = $this->pointParser->parse($this->kmlElement);

    $this->assertEquals("point-1", $kmlObject->getId());
    $this->assertEquals("target-id-1", $kmlObject->getTargetId());
    $this->assertEquals(TRUE, $kmlObject->getExtrude());
    $this->assertInstanceOf(Coordinates::class, $kmlObject->getCoordinates());
  }
}
