<?php

namespace LibKml\Tests\Reader\Kml\Geometry;

use LibKml\Domain\FieldType\AltitudeMode;
use LibKml\Domain\FieldType\Coordinates;
use LibKml\Reader\Kml\Geometry\LinearRingParser;
use PHPUnit\Framework\TestCase;

class LinearRingParserTest extends TestCase {

  const KML_LINEAR_RING = <<<'TAG'
<LinearRing id="linear-ring-1" targetId="target-id-1">
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
</LinearRing>
TAG;

  /**
   * @var LinearRingParser
   */
  protected $linearRingParser;

  /**
   * @var LinearRing
   */
  protected $linearRing;
  protected $kmlElement;

  public function setUp() {
    $this->linearRingParser = new LinearRingParser();
    $this->kmlElement = simplexml_load_string(self::KML_LINEAR_RING);
    $this->linearRing = $this->linearRingParser->parse($this->kmlElement);
  }

  public function testParseId() {
    $this->assertEquals("linear-ring-1", $this->linearRing->getId());
  }

  public function testParseTargetId() {
    $this->assertEquals("target-id-1", $this->linearRing->getTargetId());
  }

  public function testParseExtrude() {
    $this->assertTrue($this->linearRing->getExtrude());
  }

  public function testParseTessellate() {
    $this->assertTrue($this->linearRing->getTessellate());
  }

  public function testParseAltitudeMode() {
    $this->assertEquals(AltitudeMode::ABSOLUTE, $this->linearRing->getAltitudeMode());
  }

  public function testParseCoordinates() {
    $this->assertCount(5, $this->linearRing->getCoordinates());
    $this->assertContainsOnlyInstancesOf(Coordinates::class, $this->linearRing->getCoordinates());
  }

}
