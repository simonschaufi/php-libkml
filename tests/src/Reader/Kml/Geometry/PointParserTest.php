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

  /**
   * @var Point
   */
  protected $point;
  
  protected $kmlElement;

  public function setUp() {
    $this->pointParser = new PointParser();
    $this->kmlElement = simplexml_load_string(self::KML_POINT);
    $this->point = $this->pointParser->parse($this->kmlElement);
  }

  public function testParseId() {
    $this->assertEquals("point-1", $this->point->getId());
  }

  public function testParseTargetId() {
    $this->assertEquals("target-id-1", $this->point->getTargetId());
  }

  public function testParseExtrude() {
    $this->assertEquals(TRUE, $this->point->getExtrude());
  }

  public function testParseCoordinates() {
    $this->assertInstanceOf(Coordinates::class, $this->point->getCoordinates());
  }
}
