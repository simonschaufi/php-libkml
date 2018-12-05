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
  protected $linearRing;
  protected $kmlElement;

  public function setUp() {
    $this->linearRing = new LinearRingParser();
    $this->kmlElement = simplexml_load_string(self::KML_LINEAR_RING);
  }

  public function testParse() {
    $kmlObject = $this->linearRing->parse($this->kmlElement);

    $this->assertEquals("linear-ring-1", $kmlObject->getId());
    $this->assertEquals("target-id-1", $kmlObject->getTargetId());
    $this->assertTrue($kmlObject->getExtrude());
    $this->assertTrue($kmlObject->getTessellate());
    $this->assertEquals(AltitudeMode::ABSOLUTE, $kmlObject->getAltitudeMode());
    $this->assertCount(5, $kmlObject->getCoordinates());
    $this->assertContainsOnlyInstancesOf(Coordinates::class, $kmlObject->getCoordinates());
  }

}
