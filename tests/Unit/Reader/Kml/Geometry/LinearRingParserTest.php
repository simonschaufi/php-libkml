<?php

declare(strict_types=1);

namespace LibKml\Tests\Unit\Reader\Kml\Geometry;

use LibKml\Domain\FieldType\AltitudeMode;
use LibKml\Domain\FieldType\Coordinates;
use LibKml\Reader\Kml\Geometry\LinearRingParser;
use PHPUnit\Framework\TestCase;

final class LinearRingParserTest extends TestCase
{
    public const KML_LINEAR_RING = <<<'TAG'
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

    protected function setUp(): void
    {
        $this->linearRing = new LinearRingParser();
        $this->kmlElement = simplexml_load_string(self::KML_LINEAR_RING);
    }

    public function testParse(): void
    {
        $kmlObject = $this->linearRing->parse($this->kmlElement);

        self::assertEquals('linear-ring-1', $kmlObject->getId());
        self::assertEquals('target-id-1', $kmlObject->getTargetId());
        self::assertTrue($kmlObject->getExtrude());
        self::assertTrue($kmlObject->getTessellate());
        self::assertEquals(AltitudeMode::ABSOLUTE, $kmlObject->getAltitudeMode());
        self::assertCount(5, $kmlObject->getCoordinates());
        self::assertContainsOnlyInstancesOf(Coordinates::class, $kmlObject->getCoordinates());
    }
}
