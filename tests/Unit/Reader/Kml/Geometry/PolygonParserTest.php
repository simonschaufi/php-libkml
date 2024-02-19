<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\Geometry;

use LibKml\Domain\FieldType\AltitudeMode;
use LibKml\Domain\Geometry\LinearRing;
use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\Geometry\PolygonParser;
use PHPUnit\Framework\TestCase;

final class PolygonParserTest extends TestCase
{
    private const KML_POLYGON = <<<'TAG'
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

    private PolygonParser $polygonParser;

    /**
     * @var Polygon
     */
    private KmlObject $polygon;

    private $kmlElement;

    protected function setUp(): void
    {
        $this->polygonParser = new PolygonParser();
        $this->kmlElement = simplexml_load_string(self::KML_POLYGON);
        $this->polygon = $this->polygonParser->parse($this->kmlElement);
    }

    public function testParseId(): void
    {
        self::assertEquals('polygon-1', $this->polygon->getId());
    }

    public function testParseTargetId(): void
    {
        self::assertEquals('target-id-1', $this->polygon->getTargetId());
    }

    public function testParseExtrude(): void
    {
        self::assertTrue($this->polygon->getExtrude());
    }

    public function testParseTessellate(): void
    {
        self::assertTrue($this->polygon->getTessellate());
    }

    public function testParseAltitudeMode(): void
    {
        self::assertEquals(AltitudeMode::ABSOLUTE, $this->polygon->getAltitudeMode());
    }

    public function testParseOuterBondary(): void
    {
        self::assertInstanceOf(LinearRing::class, $this->polygon->getOuterBoundaryIs());
    }

    public function testParseInnerBoundary(): void
    {
        self::assertInstanceOf(LinearRing::class, $this->polygon->getInnerBoundaryIs());
    }
}
