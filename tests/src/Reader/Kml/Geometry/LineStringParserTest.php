<?php

namespace LibKml\Tests\Reader\Kml\Geometry;

use LibKml\Domain\FieldType\AltitudeMode;
use LibKml\Domain\FieldType\Coordinates;
use LibKml\Reader\Kml\Geometry\LineStringParser;
use PHPUnit\Framework\TestCase;

class LineStringParserTest extends TestCase {

  const KML_LINE_STRING = <<<'TAG'
<LineString id="line-string-1" targetId="target-id-1">
  <extrude>1</extrude>
  <tessellate>1</tessellate>
  <altitudeMode>absolute</altitudeMode>
  <coordinates>
    -122.365662,37.826988,0
    -122.365202,37.826302,0
    -122.364581,37.82655,0
    -122.365038,37.827237,0
    -122.365662,37.826988,0
  </coordinates>
</LineString>
TAG;

  /**
   * @var LineStringParser
   */
  protected $lineStringParser;

  /**
   * @var LineString
   */
  protected $lineString;
  
  protected $kmlElement;

  public function setUp() {
    $this->lineStringParser = new LineStringParser();
    $this->kmlElement = simplexml_load_string(self::KML_LINE_STRING);
    $this->lineString = $this->lineStringParser->parse($this->kmlElement);
  }

  public function testParseId() {
    $this->assertEquals("line-string-1", $this->lineString->getId());
  }

  public function testParseTargetId() {
    $this->assertEquals("target-id-1", $this->lineString->getTargetId());
  }

  public function testParseExtrude() {
    $this->assertTrue($this->lineString->getExtrude());
  }

  public function testParseTessellate() {
    $this->assertTrue($this->lineString->getTessellate());
  }

  public function testParseAltitudeMode() {
    $this->assertEquals(AltitudeMode::ABSOLUTE, $this->lineString->getAltitudeMode());
  }

  public function testParseCoordinates() {
    $this->assertCount(5, $this->lineString->getCoordinates());
    $this->assertContainsOnlyInstancesOf(Coordinates::class, $this->lineString->getCoordinates());
  }

}

