<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\Geometry;

use LibKml\Domain\FieldType\AltitudeMode;
use LibKml\Domain\Geometry\LinearRing;
use LibKml\Reader\Kml\Geometry\PolygonParser;
use PHPUnit\Framework\TestCase;

final class PolygonParserTest extends TestCase
{
    public const KML_POLYGON = <<<'TAG'
<Polygon id="polygon-1" targetId="target-id-1">
  <extrude>1</extrude>
  <tessellate>1</tessellate>
  <altitudeMode>absolute</altitudeMode>
  <outerBoundaryIs>
    <LinearRing>
      <coordinates>
        -122.366278,37.818844,30
        -122.365248,37.819267,30
        -122.365640,37.819861,30
        -122.366669,37.819429,30
        -122.366278,37.818844,30
      </coordinates>
    </LinearRing>
  </outerBoundaryIs>
  <innerBoundaryIs>
    <LinearRing>
      <coordinates>
        -122.366212,37.818977,30
        -122.365424,37.819294,30
        -122.365704,37.819731,30
        -122.366488,37.819402,30
        -122.366212,37.818977,30
      </coordinates>
    </LinearRing>
  </innerBoundaryIs>
</Polygon>
TAG;

    /**
     * @var PolygonParser
     */
    protected $lineString;
    protected $kmlElement;

    protected function setUp(): void
    {
        $this->lineString = new PolygonParser();
        $this->kmlElement = simplexml_load_string(self::KML_POLYGON);
    }

    public function testParse(): void
    {
        $kmlObject = $this->lineString->parse($this->kmlElement);

        self::assertEquals('polygon-1', $kmlObject->getId());
        self::assertEquals('target-id-1', $kmlObject->getTargetId());
        self::assertTrue($kmlObject->getExtrude());
        self::assertTrue($kmlObject->getTessellate());
        self::assertEquals(AltitudeMode::ABSOLUTE, $kmlObject->getAltitudeMode());
        self::assertInstanceOf(LinearRing::class, $kmlObject->getOuterBoundaryIs());
        self::assertInstanceOf(LinearRing::class, $kmlObject->getInnerBoundaryIs());
    }
}
