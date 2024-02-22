<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\Geometry;

use LibKml\Domain\FieldType\AltitudeMode;
use LibKml\Domain\FieldType\Coordinates;
use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\Geometry\LinearRingParser;
use PHPUnit\Framework\TestCase;

final class LinearRingParserTest extends TestCase
{
    private const KML_LINEAR_RING = <<<'TAG'
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

    private LinearRingParser $linearRingParser;

    /**
     * @var LinearRing
     */
    private KmlObject $linearRing;
    private $kmlElement;

    protected function setUp(): void
    {
        $this->linearRingParser = new LinearRingParser();
        $this->kmlElement = simplexml_load_string(self::KML_LINEAR_RING);
        $this->linearRing = $this->linearRingParser->parse($this->kmlElement);
    }

    public function testParseId(): void
    {
        self::assertEquals('linear-ring-1', $this->linearRing->getId());
    }

    public function testParseTargetId(): void
    {
        self::assertEquals('target-id-1', $this->linearRing->getTargetId());
    }

    public function testParseExtrude(): void
    {
        self::assertTrue($this->linearRing->getExtrude());
    }

    public function testParseTessellate(): void
    {
        self::assertTrue($this->linearRing->getTessellate());
    }

    public function testParseAltitudeMode(): void
    {
        self::assertEquals(AltitudeMode::ABSOLUTE, $this->linearRing->getAltitudeMode());
    }

    public function testParseCoordinates(): void
    {
        self::assertCount(5, $this->linearRing->getCoordinates());
        self::assertContainsOnlyInstancesOf(Coordinates::class, $this->linearRing->getCoordinates());
    }
}
