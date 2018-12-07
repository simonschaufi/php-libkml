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
  protected $lineString;
  protected $kmlElement;

  public function setUp() {
    $this->lineString = new LineStringParser();
    $this->kmlElement = simplexml_load_string(self::KML_LINE_STRING);
  }

  public function testParse() {
    $kmlObject = $this->lineString->parse($this->kmlElement);

    $this->assertEquals("line-string-1", $kmlObject->getId());
    $this->assertEquals("target-id-1", $kmlObject->getTargetId());
    $this->assertTrue($kmlObject->getExtrude());
    $this->assertTrue($kmlObject->getTessellate());
    $this->assertEquals(AltitudeMode::ABSOLUTE, $kmlObject->getAltitudeMode());
    $this->assertCount(5, $kmlObject->getCoordinates());
    $this->assertContainsOnlyInstancesOf(Coordinates::class, $kmlObject->getCoordinates());
  }

}

